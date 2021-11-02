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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::suggestions()->get()->take(config('home.get_course'));

        $otherCourses = Course::inRandomOrder()->get()->take(config('home.get_course'));

        $reviews = Review::highRating()->take(config('home.get_review'))->get();

        $totalCourses = Course::count();

        $totalLessons = Lesson::count();

        $totalLearners = User::where('role', User::ROLE_STUDENT)->count();
        
        return view('pages.home', compact('courses', 'otherCourses', 'reviews', 'totalCourses', 'totalLessons', 'totalLearners'));
    }
}
