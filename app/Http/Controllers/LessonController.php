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

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function show(Course $course, Lesson $lesson)
    {
        $tags = Tag::tags($course->id)->get();

        $courses = Course::suggestions()->get();

        $courseTeachers = User::lessonTeachers($lesson->id)->get();

        $programs = Program::programs($lesson->id)->get();

        return view('courses.lessons.show', compact('course', 'lesson', 'tags', 'courses', 'courseTeachers', 'programs'));
    }

    public function join(Course $course, Lesson $lesson)
    {
        if ($lesson->join == config('lessons.joinin')) {
            $lesson->users()->attach([Auth::user()->id ?? false]);
        }

        return back();
    }

    public function leave(Course $course, Lesson $lesson)
    {
        if ($lesson->join != config('lessons.joinin')) {

            $lesson->users()->detach([Auth::user()->id ?? false]);

            $programs = Program::programs($lesson->id)->get();
            
            foreach ($programs as $program) {
                $program->users()->detach([Auth::user()->id ?? false]);
            }
        }
        
        return back();
    }
}
