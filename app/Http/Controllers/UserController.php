<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userShow(Request $request)
    {
        $user = $request->user();

        return view('user.info', compact('user'));
    }

    public function updateAvatar(Request $request)
    {
        $user = $request->user();
        $user->avatar = $request->avatar->store('avatar', 'public');
        $user->save();

        return redirect(route('user.info'));
    }
}
