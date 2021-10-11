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

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function edit(Request $request, User $user)
    {
        $user->name = $request['name'];
        $user->birthday = $request['birthday'];
        if ($request['email'] != null) {
        $user->email = $request['email'];
        }
        $user->address = $request['address'];
        $user->phone = $request['phone'];
        $user->intro = $request['about_me'];
        $user->save();
        return back()->with('success', 'Edit successfully!');
    }
}
