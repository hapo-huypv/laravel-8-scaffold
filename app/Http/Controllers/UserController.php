<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        if (isset(Auth::user()->id)) {
            $courses = $user->courses;
            
            return view('profile.show', compact('user', 'courses'));
        } else {
            return "404";
        }
    }

    public function update(UserRequest $request, User $user)
    {
        if (isset($request['image'])) {
            $user->uploadImg($request, $user);

            return back()->with('success', 'Edit successfully!');
        } elseif (!isset($request['image']) && isset($request['name'])) {
            $user->edit($request, $user);

            return back()->with('success', 'Edit successfully!');
        } else {
            return back()->with('error', 'Update failed');
        }
    }
}
