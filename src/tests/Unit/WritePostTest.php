<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WritePostTest extends TestCase
{
    use RefreshDatabase;
    private $seed = true;

    public function test_post_creation()
    {
        $data = [
            'heading' => 'Test post',
            'content' => 'Test content',
        ];

        $user = User::firstWhere('username', 'Walter');

        $this->assertEquals($user->postStatus, 0);
        $this
            ->actingAs($user)
            ->post('/writepost', $data)
            ->assertRedirect('/');


        $post = Post::firstWhere('heading', $data['heading']);
        $this->assertNotNull($post);
        $this->assertEquals($post->content, $data['content']);

        $user = $user->fresh();
        $this->assertEquals($user->postStatus, 1);
    }

    public function test_double_post_creation_attempt()
    {
        // Kreiraj prvi post
        $this->test_post_creation();

        $data = [
            'heading' => 'Test post 2',
            'content' => 'Test content 2',
        ];

        $user = User::firstWhere('username', 'Walter');
        $this->assertEquals($user->postStatus, 1);

        $this
            ->actingAs($user)
            ->post('/writepost', $data)
            ->assertRedirect('/');

        $this->assertEquals($user->postStatus, 1);


        $post = Post::firstWhere('heading', $data['heading']);
        $this->assertNull($post);
    }
}
