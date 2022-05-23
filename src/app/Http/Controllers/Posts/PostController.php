<?php
//Autor: Petar Repac

namespace App\Http\Controllers\Posts;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Posts\CommentController;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
   public static $pageSize = 10;
    public function showPosts(Request $request)
    {
        //Uzima pageSize broj objava - paginacija
        $posts = Post::all(); //->skip($page * PostController::$pageSize)->take(PostController::$pageSize);
        $data['posts'] = $posts;
        $data['msg'] = [
            'title' => 'asajisa',
            'content' => 'efijsef',
            'type' => 'success',
        ];
        return view('posts.all', ['data' => $data] );

    }


    protected function showPostForm(Request $request){
        return view('posts.write', []);
    }


    protected function showSpecificPost($id){
        $post = Post::find($id);
        $author = User::find($post->author);
        $comments = CommentController::getComments($id);

        foreach($comments as $comment){
            $username = User::all()->where('idUser', $comment->commenter)->first()->username;

            $comment->username= $username;
        }
 
        $data['post'] = $post;
        $data['author'] = $author;
        $data['comments'] = $comments;
 
        return view('posts.post', ['data' => $data]);
    }


    /**
     * Get a validator for an incoming post create request
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'heading' => ['required', 'string', 'min:3' , 'max:255'],
            'content' => ['required', 'string', 'min:5', 'max:8192'],
        ]);
    }


    /**
     * Pisanje nove objave
     *
     * @param  array  $data
     * @return \App\Post
     */
    protected function writePost(Request $request)
    {
        $currTime = Carbon::now();
        $idUser =Auth::user()->idUser;
        $prevPost = Post::all()->where('author', $idUser)->first();

        //Jedna objava dnevno
        if($currTime->diffInDays($prevPost->timePosted)){
            //Ne moze vise, obavestenje
        }
        else{
            Post::create([
                'heading' => $request->input('heading'),
                'content' => $request->input('content'),
                'timePosted' => $currTime,
                'isPermanent' => false,
                'isLocked' => false,
                'author' => $idUser
            ]);
        }
        
       return redirect('/posts');
    }
}
