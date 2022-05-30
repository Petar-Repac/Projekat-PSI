<?php

// Autor: Vukašin Stepanović & Petar Repac

namespace App;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class Utilities
{
  public static function showDialog($title, $content, $type = "success")
  {
    Session::flash("dialog", json_encode(compact("title", "content", "type")));
  }

  private static function comparePosts(Post $a, Post $b)
  {
    if ($a == null) return $b;
    if ($b == null) return $a;

    $votesA = array_map(fn ($vote): int => $vote->value, $a->votes->all());
    $votesB = array_map(fn ($vote): int => $vote->value, $b->votes->all());

    $sumA = array_sum($votesA);
    $sumB = array_sum($votesB);

    return $sumA > $sumB ? $a : $b;
  }

  public static function triggerSelection()
  {
    $authors = User::where('postStatus', 1)->get();
    $winnerPost = null;

    foreach ($authors as $author) {
      // Korisnik moze da postavi samo jedan post, tako da
      // dohvatamo sa first().
      $post = $author->posts->filter(function ($item) {
        return !$item->isPermanent;
      })->first();

      if ($winnerPost == null) {
        $winnerPost = $post;
      } else {
        $winnerPost = self::comparePosts($winnerPost, $post);
      }
    }

    foreach ($authors as $author) {
      $author->postStatus = $author->idUser == $winnerPost->author ? 3 : 4;
      $author->save();
    }

    foreach ($authors as $author) {
      $post = $author->posts->filter(function ($item) {
        return !$item->isPermanent;
      })->first();

      if ($winnerPost && $post->idPost == $winnerPost->idPost) {
        $post->isPermanent = true;
        $post->save();
      } else {
        $post->delete();
      }
    }

    return $winnerPost;
  }
}
