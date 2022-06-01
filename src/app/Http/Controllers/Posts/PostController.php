<?php
//Autor: Petar Repac & Vukašin Stepanović

namespace App\Http\Controllers\Posts;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Posts\CommentController;
use App\Models\User;
use App\Models\Post;
use App\Models\Vote;
use App\Models\Comment;
use App\Utilities;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    //Autor: Petar Repac
    public function display($posts)
    {

        $authUser = Auth::user();
        //Dohvatanje lajkova
        foreach ($posts as $post) {
            $upvotes = count(Vote::all()->where('post', $post->idPost)->where('value', 1));
            $downvotes = count(Vote::all()->where('post', $post->idPost)->where('value', -1));
            $commentNum = count(Comment::all()->where('post', $post->idPost));
            if (isset($authUser)) {
                $userCommented = count(Comment::all()->where('post', $post->idPost)->where('commenter', $authUser->idUser)) > 0;
            } else {
                $userCommented = false;
            }
            $author = User::find($post->author);
            $userVote = null;
            if ($authUser) {
                $userVote = Vote::where('voter', $authUser->idUser)->where('post', $post->idPost)->first();
                $userVote = isset($userVote) ? $userVote->value : 0;
            }


            $post->userVote = $userVote;
            $post->upvotes = $upvotes;
            $post->downvotes = $downvotes;
            $post->authorName = $author->username;
            $post->commentNum = $commentNum;
            $post->userCommented = $userCommented;
        }

        return view('posts.all', compact('posts'));
    }

    public function showPosts(Request $request)
    {
        $posts = Post::all();
        return $this->display($posts);
    }



    public function searchPosts($type, $state, $keywords = null)
    {
        switch ($type) {
            case 'best':
            case 'worst':
            case 'new':
                break;
            default:
                $type = 'new';
        }

        switch ($state) {
            case 'hall':
            case 'purgatory':
            case 'all':
                break;
            default:
                $state = 'all';
        }

        if (isset($keywords)) {
            $keywords = explode(' ', $keywords);
        }

        $typeParam = [];
        switch ($type) {
            case 'best':
                $typeParam = '';
                break;
            case 'worst':
                break;
            case 'new':
                break;
        }
        $posts = Post::all();
    }


    protected function vote(Request $request)
    {
        $req = json_decode($request->getContent(), true);
        $voter = $req['user'];
        $post = $req['post'];
        $value = $req['value'];

        if ($value == 0) {
            Vote::where('voter', $voter)->where('post', $post)->delete();
        } else {
            Vote::where('voter', $voter)->where('post', $post)->delete();

            Vote::create([
                'post' => intval($post),
                'value' => intval($value),
                'voter' => intval($voter),
            ]);
        }

        return response()->json($req);
    }

    protected function showPostForm(Request $request)
    {
        return view('posts.write', []);
    }


    protected function showSpecificPost($id)
    {
        $authUser = Auth::user();
        $post = Post::findOrFail($id);
        $post->upvotes = count(Vote::all()->where('post', $id)->where('value', 1));
        $post->downvotes = count(Vote::all()->where('post', $id)->where('value', -1));
        if ($authUser) {
            $userVote = Vote::where('voter', $authUser->idUser)->where('post', $post->idPost)->first();
            $userVote = isset($userVote) ? $userVote->value : 0;
        }


        $author = User::find($post->author);
        $comments = CommentController::getComments($id);



        foreach ($comments as $comment) {
            $username = User::all()->where('idUser', $comment->commenter)->first()->username;

            $comment->username = $username;
        }

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
            'heading' => ['required', 'string', 'min:3', 'max:255'],
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

        //Jedna objava dnevno
        if (Auth::user()->postStatus == 1) {
            Utilities::showDialog("Greška", "Moguće je napraviti samo jedan post pre selekcije!", "error");
            return Redirect::back();
        } else {
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

        Utilities::showDialog("Uspeh", "Objava uspešno postavljena!");

        return redirect('all');
    }


    //Autor: Vukašin Stepanović
    protected function lockPost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $req = json_decode($request->getContent(), true);

        $value = $req['value'];
        $post->isLocked = $value;
        $post->save();

        return response()->json($req);
    }
}