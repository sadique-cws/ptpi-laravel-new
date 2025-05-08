<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver("google")->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'first_name' => $googleUser->getName(),
                    'last_name' => $googleUser->getName(),
                    // 'google_id' => $googleUser->getId(),
                    // 'avatar' => $googleUser->getAvatar(),
                    'password' => bcrypt(str()->random(16)), // optional
                ]
            );

            DB::table("students")->query("select * from ");

            Auth::login($user);
            return redirect()->intended('/'); // Or your desired route

        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Google login failed']);
        }
    }

}
