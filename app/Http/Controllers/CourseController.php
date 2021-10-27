<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\CourseUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all();

        $teachers = User::teachers()->get();

        $dataRequest = $request->input();
        $courses = Course::filter($dataRequest)->paginate(config('course.number_paginations'));
        
        return view('courses.index', compact('courses', 'tags', 'teachers'));
    }

    public function show(Request $request, Course $course)
    {
        $id = $course->id;

        $tags = $course->tags()->get();

        $courses = $course->suggestions()->get();

        $array = array($request['keyword'], $id);
        
        $lessons = Lesson::lessons($array)->paginate(config('lesson.number_paginations'), ['*'], 'lessons');

        $courseTeachers = $course->users()->courseTeachers($id)->get();

        $reviews = Review::reviewByCourse($id)->paginate(config('course.paginate_review'), ['*'], 'reviews');

        return view('courses.show', compact('course', 'lessons', 'tags', 'courses', 'reviews', 'courseTeachers'));
    }

    public function join(Course $course)
    {
        $course->users()->attach([Auth::user()->id ?? false]);

        return back();
    }

    public function leave(Course $course)
    {
        $course->users()->detach([Auth::user()->id ?? false]);
        
        $lessons = $course->lessons()->get();
        foreach ($lessons as $lesson) {
            $lesson->users()->detach([Auth::user()->id ?? false]);
        }

        return back();
    }
}
