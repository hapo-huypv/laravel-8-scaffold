<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Auth;

class CourseUserController extends Controller
{
    public function store(Request $request)
    {
        $course = Course::findOrFail($request['course_id']);
        if ($course->join == config('course.joinin')) {
            $course->users()->sync([Auth::id() ?? null]);

            return back()->with('success', 'Join the course successfully');
        } else {
            return back()->with('error', 'Joined failed');
        }
    }

    public function destroy(Request $request, Course $courseUser)
    {
        if ($courseUser->join != config('course.joinin')) {
            $courseUser->users()->detach([Auth::id() ?? null]);

            return redirect()->route('courses.show', [$courseUser])->with('success', 'Leave the course successfully');
        }
    }
}
