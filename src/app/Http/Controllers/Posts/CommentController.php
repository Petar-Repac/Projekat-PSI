<?php
//Autor: Petar Repac 2019/0616

namespace App\Http\Controllers\Posts;


use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Utilities;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

/**
 *  CommentController - Klasa za ispisivanje komentara
 */
class CommentController extends Controller
{

    /**
     * Vraca sve komentare za odredjeni post
     * @param @postId integer
     * @return Comment
     */
    public static function getComments($postId)
    {

        $comments = Comment::all()->where('post', $postId);
        return $comments;
    }


    /**
     * Stvaranje novog comentara
     *
     * @param  Request $request
     * @return Response
     */
    protected function writeComment(Request $request)
    {
        $post = Post::findOrFail($request->input('postId'));

        if ($post->isLocked) {
            Utilities::showDialog("Greška", "Ne možete postaviti komentar jer je post zaključan.", "error");
            return Redirect::back()->header('X-Error', 'post_locked');
        }

        $data = [
            'commenter' => Auth::user()->idUser,
            'content' => $request->input('content'),
            'post' => $request->input('postId'),
            'timeCreated' => Carbon::now()->timestamp,
        ];

        Utilities::showDialog("Obaveštenje", "Komentar uspešno postavljen!");
        Comment::create($data);

        return redirect('/posts/' . $data['post']);
    }
}