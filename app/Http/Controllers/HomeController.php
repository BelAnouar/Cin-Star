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

    public function sendnotification()
    {
        $users = User::all();
        $details = [
            'greeting' => 'Hi!',
            'body' => 'I hope you are doing well. Thank you for your reservation.',
            'actionText' => 'Print your reservation',
            'actionUrl' => '/',
            'lastLine' => 'last',
        ];

        foreach ($users as $user) {
            Notification::send($user, new SendEmailNotification($details));
        }

        dd('done');
    }
}