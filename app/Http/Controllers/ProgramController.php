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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Lesson $lesson, Program $program)
    {
        $course = $lesson->course;

        return view('courses.lessons.show_program', compact('program', 'course', 'lesson'));
    }

    public function join(Lesson $lesson, Program $program)
    {
        $program->users()->attach([Auth::user()->id ?? false]);

        return back();
    }

    public function leave(Lesson $lesson, Program $program)
    {
        $program->users()->detach([Auth::user()->id ?? false]);
        return back();
    }
}
