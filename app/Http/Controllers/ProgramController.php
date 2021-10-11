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
    public function show(Program $program)
    {
        $lesson = Lesson::find($program->lesson_id);

        $course = Course::find($lesson->course_id);

        return view('courses.lessons.show_program', compact('program', 'course', 'lesson'));
    }

    public function learned(Program $program)
    {
        $program->users()->attach([Auth::user()->id ?? false]);

        return back();
    }

    public function leave(Program $program)
    {
        $program->users()->detach([Auth::user()->id ?? false]);
        return back();
    }
}
