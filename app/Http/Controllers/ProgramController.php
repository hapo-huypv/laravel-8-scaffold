<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Lesson;
use Auth;

class ProgramController extends Controller
{
    public function show(Lesson $lesson, Program $program)
    {
        $course = $lesson->course;

        return view('pages.programs.show', compact('program', 'course', 'lesson'));
    }
}
