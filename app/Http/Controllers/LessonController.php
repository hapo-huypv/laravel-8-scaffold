<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Models\CourseUser;
use Illuminate\Support\Facades\DB;
use Auth;

class LessonController extends Controller
{
    //
    public function show(Lesson $lesson)
    {
        $tags = Tag::tags($lesson->course_id)->get();

        $otherCourses = Course::suggestions()->get();

        $course = $lesson->course()->where('id', $lesson->course_id)->first();

        $courseTeachers = User::lessonTeachers($lesson->id)->get();

        return view('courses.lessons.show', compact('course', 'lesson', 'tags', 'otherCourses','courseTeachers'));
    }
}
