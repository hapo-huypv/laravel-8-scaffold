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
        $lessons = $course->lessons()->where('course_id', $course->id)->where('title', 'like', '%' .$request['keyword'].'%')->paginate(config('lesson.number_paginations'), ['*'], 'lessons');

        $reviews = $course->orderByReview()->paginate(config('app.paginate_review'), ['*'], 'reviews');

        return view('pages.courses.show', compact('course', 'lessons', 'reviews'));
    }
}
