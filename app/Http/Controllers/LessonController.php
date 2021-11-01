<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Models\CourseUser;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Auth;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        $tags = Tag::tags($course->id)->get();

        $courses = Course::suggestions()->get();

        $courseTeachers = User::lessonTeachers($lesson->id)->get();

        $programs = Program::programs($lesson->id)->get();

        return view('pages.lessons.show', compact('course', 'lesson', 'tags', 'courses', 'courseTeachers', 'programs'));
    }
}
