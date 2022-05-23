<?php
//Autor: Petar Repac

namespace App\Http\Controllers\Posts;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Posts\CommentController;
use App\Models\User;
use App\Models\Post;
use App\Models\Vote; 


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    
    public function showPosts(Request $request)
    {
        $posts = Post::all(); 

        //Dohvatanje lajkova
        foreach($posts as $post){
            $upvotes = count(Vote::all()->where('post', $post->idPost)->where('value', 1));
            $downvotes = count(Vote::all()->where('post', $post->idPost)->where('value', -1));


            $post->upvotes = $upvotes;
            $post->downvotes = $downvotes;
        }


        return view('posts.all', ['posts' => $posts] );

    }


    protected function vote(Request $request){

        $user = $request->input('idUser');
        $post = $request->input('idPost');
        $value = $request->input('value');

        
        Post::create([
            'heading' => $request->input('heading'),
            'content' => $request->input('content'),
        ]);
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
 
        // return view('posts.post', ['post' => $post, 'author' => $author, 'comments' => $comments]);
        return view('posts.post', compact(["post", "author", "comments"]));
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
        $user = Auth::user();
        $currTime = Carbon::now(); 
        $prevPost = Post::all()->where('author', $user->idUser)->first();

        //Jedna objava dnevno
        if(Auth::user()->postStatus == 1){
            //Ne moze vise, obavestenje
        }
        else{
            Post::create([
                'heading' => $request->input('heading'),
                'content' => $request->input('content'),
                'timePosted' => $currTime,
                'isPermanent' => false,
                'isLocked' => false,
                'author' => $user->idUser
            ]);

            User::where('idUser', $user->idUser)->update(['postStatus' => 1]);
        }
        
       return redirect('all');
    }
}

