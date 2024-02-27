<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UserFollowNotification;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function notify()
    {
        if (auth()->user()) {
            $user = User::first();
            auth()->user()->notify(new UserFollowNotification($user));
        }
    }
}
