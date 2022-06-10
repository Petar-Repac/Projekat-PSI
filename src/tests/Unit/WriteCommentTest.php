<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WriteCommentTest extends TestCase
{
    use RefreshDatabase;
    private $seed = true;

    public function test_comment_on_nonexistent_post()
    {
        $user = User::firstWhere('username', 'Walter');
        $data = [
            'postId' => 1234,
            'content' => 'Test comment',
        ];

        $this
            ->actingAs($user)
            ->post('/comment', $data)
            ->assertNotFound();
    }

    public function test_comment_on_locked_post()
    {
        $user = User::firstWhere('username', 'Walter');

        $post = Post::find(1);
        $post->isLocked = true;
        $post->save();

        $data = [
            'postId' => 1,
            'content' => 'Test comment',
        ];

        $this
            ->actingAs($user)
            ->post('/comment', $data)
            ->assertRedirect()
            ->assertHeader('X-Error', 'post_locked');
    }

    public function test_comment_on_post_successfully()
    {
        $user = User::firstWhere('username', 'Walter');

        $data = [
            'postId' => 1,
            'content' => 'Test comment',
        ];

        $this
            ->actingAs($user)
            ->post('/comment', $data)
            ->assertRedirect('/posts/' . $data['postId']);

        $comment = Comment::firstWhere('content', $data['content']);
        $this->assertNotNull($comment);
        $this->assertEquals($comment->commenter, $user->idUser);
        $this->assertEquals($comment->post, $data['postId']);
    }
}
