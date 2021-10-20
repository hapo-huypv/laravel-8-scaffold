<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use App\Models\Lesson;
use App\Models\CourseUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all()->take(3);

        $otherCourses = Course::suggestions()->get()->take(3);

        $reviews = Review::all();

        $countCourses = new Course();
        $countCourses = $countCourses->course_count;

        $countLessons = new Lesson();
        $countLessons = $countLessons->lesson_count;

        $numberLeaners = new CourseUser();
        $numberLeaners = $numberLeaners->learners;
        // dd($numberLeaners);

        return view('home', compact('courses', 'otherCourses', 'reviews', 'countCourses', 'countLessons', 'numberLeaners'));
    }
}
