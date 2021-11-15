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
        
        if ($user = User::where(['email' => $userGG->email])->first()) {
            $user->update(['google' => $userGG->id]);
            Auth::login($user);

            return redirect('home');
        }
        $user = User::where('google', $userGG->id)->first();

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
                'avatar' => $userGG->avatar,
            ]);

            Auth::login($user);

            return redirect('home');
        }
    }
}
