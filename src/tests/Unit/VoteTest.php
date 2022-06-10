<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VoteTest extends TestCase
{
    use RefreshDatabase;
    private $seed = true;

    private function _test_vote($user, $post, $oldValue, $value) {
        $vote = Vote::firstWhere(['voter' => $user->idUser, 'post' => $post->idPost]);

        if ($oldValue == 0) {
            $this->assertNull($vote);
        } else {
            $this->assertNotNull($vote);
            $this->assertEquals($vote->value, $oldValue);
        }

        $data = [
            'user' => $user->idUser,
            'post' => $post->idPost,
            'value' => $value
        ];

        $this
            ->actingAs($user)
            ->patchJson('/vote', $data)
            ->assertJson($data);

        $vote = Vote::firstWhere(['voter' => $user->idUser, 'post' => $post->idPost]);

        if ($value == 0) {
            $this->assertNull($vote);
        } else {
            $this->assertNotNull($vote);
            $this->assertEquals($vote->value, $value);
        }
    }

    public function test_try_to_vote_as_guest()
    {
        $this->patch('/vote')->assertRedirect('/login');
    }

    public function test_try_to_vote_on_locked_post()
    {
        $user = User::firstWhere('username', 'Walter');
        $post = Post::find(1);

        $post->isLocked = true;
        $post->save();

        $vote = Vote::firstWhere(['voter' => $user->idUser, 'post' => $post->idPost]);
        $this->assertNull($vote);

        $data = [
            'user' => $user->idUser,
            'post' => $post->idPost,
            'value' => 1
        ];

        $this
            ->actingAs($user)
            ->patchJson('/vote', $data)
            ->assertJson(['locked' => true]);

        $vote = Vote::firstWhere(['voter' => $user->idUser, 'post' => $post->idPost]);
        $this->assertNull($vote);
    }

    public function test_upvote()
    {
        $user = User::firstWhere('username', 'Walter');
        $post = Post::find(1);

        $this->_test_vote($user, $post, 0, 1);
    }

    public function test_downvote()
    {
        $user = User::firstWhere('username', 'Walter');
        $post = Post::find(1);

        $this->_test_vote($user, $post, 0, -1);
    }

    public function test_undo_upvote()
    {
        $user = User::firstWhere('username', 'Walter');
        $post = Post::find(1);

        $this->_test_vote($user, $post, 0, 1);
        $this->_test_vote($user, $post, 1, 0);
    }

    public function test_undo_downvote()
    {
        $user = User::firstWhere('username', 'Walter');
        $post = Post::find(1);

        $this->_test_vote($user, $post, 0, -1);
        $this->_test_vote($user, $post, -1, 0);
    }

    public function test_upvote_to_downvote()
    {
        $user = User::firstWhere('username', 'Walter');
        $post = Post::find(1);

        $this->_test_vote($user, $post, 0, 1);
        $this->_test_vote($user, $post, 1, -1);
        $this->_test_vote($user, $post, -1, 0);
    }
}
