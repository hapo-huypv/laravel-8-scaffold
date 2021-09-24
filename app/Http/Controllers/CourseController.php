<?php

namespace App\Http\Controllers;

use App\Models\Course;
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

    public function coursesSearch(Request $request)
    {
        $keyword = $request['keyword'];
        $courses = Course::where('title', 'like', "%$keyword%")->take(10)->paginate(10);

        return view('all_courses', ['courses' => $courses, 'keyword' => $keyword]);
    }
}
