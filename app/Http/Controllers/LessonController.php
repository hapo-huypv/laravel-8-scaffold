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
    //
    public function show(Lesson $lesson)
    {
        $tags = Tag::tags($lesson->course_id)->get();

        $courses = Course::suggestions()->get();

        $course = $lesson->course()->where('id', $lesson->course_id)->first();

        $courseTeachers = User::lessonTeachers($lesson->id)->get();

        $programs = Program::programs($lesson->id)->get();

        return view('courses.lessons.show', compact('course', 'lesson', 'tags', 'courses', 'courseTeachers', 'programs'));
    }

    public function join(Lesson $lesson)
    {
        $lesson->users()->attach([Auth::user()->id ?? false]);

        return back();
    }

    public function leave(Lesson $lesson)
    {
        $lesson->users()->detach([Auth::user()->id ?? false]);

        $programs = Program::programs($lesson->id)->get();
        foreach ($programs as $program) {
            $program->users()->detach([Auth::user()->id ?? false]);
        }

        return back();
    }
}
