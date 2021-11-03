<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Auth;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        return view('pages.lessons.show', compact('course', 'lesson'));
    }
}
