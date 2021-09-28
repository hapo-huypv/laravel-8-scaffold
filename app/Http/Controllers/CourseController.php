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
        $teachers = $teachers->getTeachers();

        $courses = Course::filter($request)->paginate(20);
        
        return view('all_courses', compact('courses', 'tags', 'teachers'));
    }
}
