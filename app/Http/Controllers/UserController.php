<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Models\CourseUser;
use Carbon\Carbon;
use App\Models\Program;
use App\http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    public function show(User $profile)
    {
        $user = $profile;

        if (Auth::user()->id == $user->id) {
            return view('profile.show', compact('user'));
        } else {
            return "404";
        }
    }

    public function update(UserRequest $request, User $profile)
    {
        $user = $profile;
        if (!is_null($request->file('image'))) {
            $user->uploadImg($request, $user);
        } else {
            $user->editInfoUser($request, $user);
        }

        return back()->with('success', 'Edit successfully!');
    }
}
