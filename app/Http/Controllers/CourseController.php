<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Models\CourseUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

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

    public function show(Course $course)
    {
        $id = $course->id;

        $tags = $course->tags($id)->get();

        $courses = Course::suggestions()->get();

        $lessons = $course->lessons($id)->paginate(config('lesson.number_paginations'));

        $courseTeachers = User::courseTeachers($id)->get();

        $status = new CourseUser();
        $status = $status->status($id);

        return view('courses.show', compact('course', 'lessons', 'tags', 'courses', 'status', 'courseTeachers'));
    }

    public function join(Course $course)
    {
        $course->users()->attach([Auth::user()->id ?? false]);

        return back();
    }

    public function leave(Course $course)
    {
        $course->users()->detach([Auth::user()->id ?? false]);

        return back();
    }
}
