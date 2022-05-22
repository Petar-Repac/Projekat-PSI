<?php
//Autor: Petar Repac

namespace App\Http\Controllers\Posts;


use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PostController extends Controller
{
   public static $pageSize = 10;

    public function showPosts(Request $request)
    {
        //Uzima pageSize broj objava - paginacija
        $posts = Post::all(); //->skip($page * PostController::$pageSize)->take(PostController::$pageSize);

        return view('posts', ['posts' => $posts] );

    }


    protected function showPostForm(Request $request){
        return view('write', []);
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
     * Create a new post
     *
     * @param  array  $data
     * @return \App\Post
     */
    protected function writePost(Request $request)
    {
        
        return Post::create([
            'heading' => $request->input('heading'),
            'content' => $request->input('content'),
            'timePosted' => Carbon::now()->timestamp,
            'isPermanent' => false,
            'isLocked' => false,
            'author' => auth()->user()->id
        ]);
    }
}
