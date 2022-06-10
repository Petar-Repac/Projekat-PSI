<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class PageAccessTest extends TestCase
{

    public function test_about_us_page_access()
    {
        $this->get('/about-us')->assertStatus(200);
    }

    public function test_login_page_access()
    {
        $this->get('/login')->assertStatus(200);
    }

    public function test_register_page_access()
    {
        $this->get('/register')->assertStatus(200);
    }

    public function test_home_page_access()
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_post_page_access()
    {
        $this->get('/posts/1')->assertStatus(200);
    }

    public function test_user_page_access()
    {
        $this->get('/user/admin')->assertStatus(200);
    }

    public function test_writepost_page_redirects_guest()
    {
        $this->get('/writepost')->assertRedirect('/login');
    }

    public function test_writepost_page_accepts_auth_user()
    {
        $admin = User::firstWhere('username', 'admin');
        $this->actingAs($admin)->get('/writepost')->assertStatus(200);
    }
}
