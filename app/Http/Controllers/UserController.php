<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\http\Requests\UserRequest;
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
            $user->updateImg($request, $user);
        } else {
            $user->updateInfo($request, $user);
        }

        return back()->with('success', 'Edit successfully!');
    }
}
