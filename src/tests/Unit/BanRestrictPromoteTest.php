<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class BanRestrictPromoteTest extends TestCase
{

    public function test_ban_user()
    {
        $admin = User::firstWhere('username', 'admin');
        $user = User::firstWhere('username', 'Walter');
        $data = [
            "key" => "isBanned",
            "value" => true
        ];
        $this
            ->actingAs($admin)
            ->patchJson("user/" . $user->username, $data);
        $this
            ->actingAs($admin)
            ->post("logout");

        $data = [
            "username" => "Walter",
            "password" => "tobago123"
        ];

        $this
            ->post("login", $data)
            ->assertRedirect("/");

        $this->assertNull(Auth::user());
    }
}