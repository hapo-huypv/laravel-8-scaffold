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

    public function show(Request $request)
    {
        $tags = Tag::tags($request['course_id'])->get();

        $course = Course::detailCourse($request['course_id'])->get();
        $course = $course[0];

        $courses = Course::all()->take(5);

        $lessons = Lesson::lessons($request->input())->paginate(config('lesson.number_paginations'));

        $courseUser = new CourseUser();
        $courseUser = $courseUser->joinCourse($request->input());

        $courseTeachers = User::courseTeachers($request['course_id'])->get();

        if (isset($request['leave'])) {
            $leaveCourse = new CourseUser();
            $leaveCourse = $leaveCourse->leaveCourse($request->input());
            
            $courseUser = config('lesson.joinin');
        }

        return view('courses.show', compact('course', 'lessons', 'tags', 'courses', 'courseUser', 'courseTeachers'));
    }
}
