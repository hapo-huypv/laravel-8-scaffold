<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all();

        $teachers = User::teachers()->get(['name', 'id']);

        $dataRequest = $request->input();
        $courses = Course::filter($dataRequest)->paginate(config('course.number_paginations'));
        
        return view('pages.courses.index', compact('courses', 'tags', 'teachers'));
    }

    public function show(Request $request, Course $course)
    {
        $id = $course->id;

        $courses = $course->suggestions()->get()->take(config('course.max_rate'));

        $array = array($request['keyword'], $id);
        $lessons = $course->lessons()->lessonsInCourse($array)->paginate(config('lesson.number_paginations'), ['*'], 'lessons');

        $teachers = $course->teachers;

        $reviews = $course->reviews()->reviewByCourse($id)->paginate(config('course.paginate_review'), ['*'], 'reviews');

        return view('pages.courses.show', compact('course', 'lessons', 'courses', 'reviews', 'teachers'));
    }
}
