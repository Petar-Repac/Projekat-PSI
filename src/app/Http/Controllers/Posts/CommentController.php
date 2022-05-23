<?php
//Autor: Petar Repac

namespace App\Http\Controllers\Posts;


use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
   
    public static function getComments($postId)
    {
        
        $comments = Comment::all()->where('post', $postId); 
        return $comments;

    }


    /**
     * Create a new post
     *
     * @param  array  $data
     * @return \App\Post
     */
    protected function writeComment(Request $request)
    {

        $data = [
            'commenter'=> Auth::user()->idUser,
            'content'=> $request->input('content'),
            'post'=> $request->input('postId'),
            'timeCreated'=> Carbon::now()->timestamp,
        ];

        Comment::create($data);
        /*

       $data = Validator::make($data, [
            'content' => ['required', 'string', 'min:1', 'max:8192'],
        ]);
        */


       return redirect('/posts/'. $data['post'] );
    }
}
