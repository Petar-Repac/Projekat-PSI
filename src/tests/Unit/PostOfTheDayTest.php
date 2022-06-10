<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostOfTheDayTest extends TestCase
{
    use RefreshDatabase;
    private $seed = true;

    public function test_try_trigger_selection_as_guest()
    {
        $this->post('/trigger-selection')->assertRedirect('/login');
    }

    public function test_trigger_selection()
    {
        $user = User::firstWhere('username', 'admin');

        $authors = User::where('postStatus', 1);
        $nonAuthors = User::where('postStatus', 0);

        $winner = Post::find(4);

        $this
            ->actingAs($user)
            ->postJson('/trigger-selection')
            ->assertJsonPath('winner.idPost', $winner->idPost);


        $winner = $winner->fresh();

        foreach ($authors as $author) {
            $this->assertEquals($author->postStatus, $author->idUser == $winner->author ? 3 : 4);
        }

        foreach ($nonAuthors as $nonAuthor) {
            $this->assertEquals($nonAuthor->postStatus, 0);
        }

        $this->assertEquals($winner->isPermanent, true);
    }

    public function test_double_selection() {
        $this->test_trigger_selection();

        $user = User::firstWhere('username', 'admin');
        $this
            ->actingAs($user)
            ->postJson('/trigger-selection')
            ->assertJsonPath('winner', null);
    }

    public function test_selection_without_candidate_posts() {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->isPermanent = true;
            $post->save();
        }

        $authors = User::all();
        foreach ($authors as $author) {
            $author->postStatus = 0;
            $post->save();
        }

        $user = User::firstWhere('username', 'admin');
        $this
            ->actingAs($user)
            ->postJson('/trigger-selection')
            ->assertJsonPath('winner', null);
    }

    public function test_autoselection_without_key() {
        $user = User::firstWhere('username', 'admin');
        $this
            ->actingAs($user)
            ->postJson('/trigger-auto-selection')
            ->assertStatus(500)
            ->assertJson(['error' => 'Missing autoselect key.']);
    }

    public function test_autoselection_with_incorrect_key() {
        $user = User::firstWhere('username', 'admin');
        $this
            ->actingAs($user)
            ->postJson('/trigger-auto-selection', ['key' => 'foobar'])
            ->assertStatus(500)
            ->assertJson(['error' => 'Incorrect autoselect key.']);
    }

    public function test_trigger_autoselection() {
        $user = User::firstWhere('username', 'admin');

        $authors = User::where('postStatus', 1);
        $nonAuthors = User::where('postStatus', 0);

        $winner = Post::find(4);

        $this
            ->actingAs($user)
            ->postJson('/trigger-auto-selection', ['key' => env('TOBAGO_AUTO_SELECT_KEY')])
            ->assertJsonPath('winner.idPost', $winner->idPost);


        $winner = $winner->fresh();

        foreach ($authors as $author) {
            $this->assertEquals($author->postStatus, $author->idUser == $winner->author ? 3 : 4);
        }

        foreach ($nonAuthors as $nonAuthor) {
            $this->assertEquals($nonAuthor->postStatus, 0);
        }

        $this->assertEquals($winner->isPermanent, true);
    }
}
