<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Auth;

class CourseUserController extends Controller
{
    public function store(Request $request)
    {
        $course = Course::findOrFail($request['course_id']);
        $course->users()->attach([Auth::user()->id ?? false]);

        return back();
    }
}
