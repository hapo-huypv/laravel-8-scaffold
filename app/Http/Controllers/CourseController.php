<?php

namespace App\Http\Controllers;
use App\Models\Courses;
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

    public function course()
    {
        $courses = DB::table('courses')->select('*');
        $courses = $courses->get();

        return view('all_courses', ['courses' => $courses]);
    }
}
