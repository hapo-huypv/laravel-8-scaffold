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
        if (isset(Auth::user()->id)) {
            return view('profile.show', compact('user'));
        } else {
            return "404";
        }
    }

    public function edit(Request $request, User $user)
    {
        $user->edit($request, $user);

        return back()->with('success', 'Edit successfully!');
    }

    public function upload(Request $request, User $user)
    {
        $image = $request->file('image');
        $image->move('assets/img', $image->getClientOriginalName());
        
        $user->avatar = 'assets/img/'. $image->getClientOriginalName();
        $user->save();
        
        return back();
    }
}
