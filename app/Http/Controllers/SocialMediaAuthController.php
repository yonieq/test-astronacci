<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialMediaAuthController extends Controller
{
    //
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

//        check if they're an existing user if exists login if not create new user then login
        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){
            Auth::login($existingUser, true);
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email'=> $user->email,
                'type'=> 'A',
                'password'=> encrypt('123456dummy')
            ]);

            Auth::login($newUser, true);
        }

        return redirect()->route('home');
    }
}
