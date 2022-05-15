<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $request, $username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();

        // dd($user);

        return view('user', ['user' => $user]);
    }
}
