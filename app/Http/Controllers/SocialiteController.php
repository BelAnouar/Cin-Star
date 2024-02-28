<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToFaceBook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route("welcome");
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social' => "google",
                    'password' => Hash::make('my-google')

                ]);
                Auth::login($newUser);
                return redirect()->route("welcome");
            }
        } catch (Exception $th) {
            dd($th->getMessage());
        }
    }

    public function handleFacebook()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect("/");
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social' => "facebook",
                    'password' => Hash::make('my-facebook')

                ]);
                Auth::login($newUser);
                return redirect("/");
            }
        } catch (Exception $th) {
            dd($th->getMessage());
        }
    }

    public function handleGithub()
    {
        try {
            $user = Socialite::driver('github')->user();
            $finduser = User::where('social_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect("/");
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social' => "github",
                    'password' => Hash::make('my-github')

                ]);
                Auth::login($newUser);
                return redirect("/");
            }
        } catch (Exception $th) {
            dd($th->getMessage());
        }
    }
}
