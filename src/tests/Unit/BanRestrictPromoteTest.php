<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class BanRestrictPromoteTest extends TestCase
{

    public function test_ban_user()
    {
        $admin = User::firstWhere('username', 'admin');
        $data = [
            "key" => "isBanned",
            "value" => true
        ];
        $this
            ->actingAs($admin)
            ->patchJson("user/Walter", $data);


        $user = User::firstWhere('username', 'Walter');

        $this->assertEquals($user->isBanned, 1);
    }

    public function test_promote_user()
    {
        $admin = User::firstWhere('username', 'admin');
        $data = [
            "key" => "role",
            "value" => "mod"
        ];
        $this
            ->actingAs($admin)
            ->patchJson("user/Asha20", $data);


        $user = User::firstWhere('username', 'Asha20');

        $this->assertEquals($user->role, Role::mod()->idRole);
    }

    public function test_restrict_post()
    {
        $admin = User::firstWhere('username', 'admin');
        $post = Post::firstWhere('heading', 'Cyber Sex');
        $data = [
            "value" => 1
        ];
        $this
            ->actingAs($admin)
            ->patchJson("posts/" . $post->idPost, $data);


        $post = Post::firstWhere('heading', 'Cyber Sex');

        $this->assertEquals($post->isLocked, 1);
    }
}