<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
                break;
            case 'isBanned':
                $user->isBanned = $req['value'];
                break;
            case 'role':
                $role = null;
                switch ($req['value']) {
                    case "user":
                        $role = Role::user();
                        break;
                    case "mod":
                        $role = Role::mod();
                        break;
                    case "admin":
                        $role = Role::admin();
                        break;
                }
                $user->role = $role->idRole;
                break;
        }

        $user->save();

        return response()->json($req);
    }
}
