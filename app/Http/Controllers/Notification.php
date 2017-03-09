<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Notification extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $notifications = $user->notifications;

        return view('notification.index', compact('notifications'));
    }
}
