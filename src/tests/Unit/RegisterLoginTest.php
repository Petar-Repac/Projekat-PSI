<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class RegisterLoginTest extends TestCase
{

    public function test_register_user()
    {
        $data = [
            "username" => "TestKorisnik",
            "password" => "tobago123",
            "password_confirmation" => "tobago123",
        ];

        $this
            ->post("register", $data)
            ->assertRedirect("/");

        $user = User::firstWhere('username', 'TestKorisnik');
        $this->assertNotNull($user);
    }

    public function test_register_duplicate_user()
    {
        $data = [
            "username" => "Walter",
            "password" => "tobago123",
            "password_confirmation" => "tobago123",
        ];

        $this
            ->post("register", $data)
            ->assertRedirect("/");

        $userNum = count(User::all()->where('username', 'Walter'));
        $this->assertTrue($userNum == 1);
    }


    public function test_login_user()
    {
        $data = [
            "username" => "Walter",
            "password" => "tobago123"
        ];

        $this
            ->post("login", $data)
            ->assertRedirect("/");

        $this->assertTrue(Auth::user()->username == "Walter");
    }

    public function test_login_user_wrong_data()
    {
        $data = [
            "username" => "Walter",
            "password" => "tobago"
        ];

        $this
            ->post("login", $data)
            ->assertRedirect("/");

        $this->assertNull(Auth::user());
    }

    public function test_logout_user()
    {
        $data = [
            "username" => "Walter",
            "password" => "tobago123"
        ];

        $this
            ->post("login", $data)
            ->assertRedirect("/");

        $this->post("logout");

        $this->assertNull(Auth::user());
    }
}