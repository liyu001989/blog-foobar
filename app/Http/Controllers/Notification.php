<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Notification extends Controller
{
    public function index(Request $request)
    {
        dd('没做完')
        $user = $request->user();
        //$notifications = $user->notifications;

        return view('notificaion.index');
    }
}
