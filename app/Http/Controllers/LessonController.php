<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Program;
use Auth;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        $courses = $course->suggestions()->get();

        $teachers = $lesson->teachers;

        return view('pages.lessons.show', compact('course', 'lesson', 'courses', 'teachers'));
    }
}
