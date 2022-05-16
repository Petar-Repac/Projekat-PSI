<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $request, $username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();

        return view('user', ['user' => $user]);
    }

    public function patch(Request $request, $username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();

        $req = json_decode($request->getContent(), true);

        switch ($req['key']) {
            case 'status':
                $user->status = $req['value'];
                $user->save();
                break;
        }

        return response()->json($req);
    }
}
