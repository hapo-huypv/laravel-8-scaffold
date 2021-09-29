<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function create($data)
    {
        return Course::create([
            'title' => $data['title'],
            'logo_path' => $data['logo_path'],
            'description' => $data['description'],
            'intro' => $data['intro'],
            'learn_time' => $data['learn_time'],
            'quizzes' => $data['quizzes'],
            'price' => $data['price'],
        ]);
    }
    
    public function courses(Request $request)
    {
        $tags = Tag::all();

        $teachers = new User();
        $teachers = User::teachers();

        $courses = Course::filter($request)->paginate(config('course.numberPaginations'));
        
        return view('courses.all_courses', compact('courses', 'tags', 'teachers'));
    }
}
