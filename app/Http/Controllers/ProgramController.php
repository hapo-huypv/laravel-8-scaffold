<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
use App\Models\Course;
use Auth;

class ProgramController extends Controller
{
    public function show(Course $course, Lesson $lesson, Program $program)
    {
        return view('courses.lessons.show_program', compact('program', 'course', 'lesson'));
    }

    public function edit(Program $program)
    {
        if ($program->join == config('course.joinin')) {
            $program->users()->attach([Auth::user()->id ?? false]);

            return back();
        } else {
            $program->users()->detach([Auth::user()->id ?? false]);
            return back();
        }
       
    }
}
