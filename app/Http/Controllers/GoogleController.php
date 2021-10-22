<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $userGG = Socialite::driver('google')->user();
        // dd($userGG->id);
        
        $user = User::where('google', $userGG->id)->first();
        // dd($user);
        if (!empty($user)) {
            Auth::login($user);

            return redirect('home');
        } else {
            $user = User::create([
                'name' => $userGG->name,
                'email' => $userGG->email,
                'password' => bcrypt('12345678'),
                'role' => '0',
                'google' => $userGG->id,
            ]);

            // dd($user);
            Auth::login($user);

            return redirect('home');
        }
    }
}
