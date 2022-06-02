<?php
//Autor: Petar Repac 2019/0616 & Vukašin Stepanović 2019/0133

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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

/**
 * PostController klasa zadužena za
 * prikaz, unos, pretragu, pisanje novih, zaključavanje i glasanje na objavama
 */
class PostController extends Controller
{

    //Autor: Petar Repac 2019/0616


    /**
     * Prikaz prodledjenih objava na pocetnoj strani
     * 
     * @param App\Models\Post $posts
     * @param string[] $searchParams
     * @return Response
     */
    public function display($posts, $searchParams = null)
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

        return view('posts.all', compact(['posts', 'searchParams']));
    }

    /**
     *   Prikaz svih objava na pocetnoj strani
     *  @param Request $request 
     *  @return Response
     */
    public function showPosts(Request $request)
    {
        $posts = Post::all();
        return $this->display($posts);
    }

    /**
     *   Prikaz objava koje ispunjavaju uslove pretrage na pocetnoj strani
     *  @param Request $request 
     *  @return Response
     */
    public function searchPosts(Request $request)
    {
        $type = $request->get('type', null);
        $state = $request->get('state', null);
        $keywords = $request->get('keywords', null);


        $posts = DB::table('Post')
            ->select('idPost', 'isPermanent', 'timePosted', 'heading', 'content', 'author', 'isLocked')
            ->selectRaw('SUM(V.value) as score')
            ->Join('Vote as V', 'idPost', '=', 'post', 'left outer')
            ->groupBy('idPost', 'isPermanent', 'timePosted', 'heading', 'content', 'author', 'isLocked');


        switch ($type) {
            case 'best':
                $posts = $posts->orderBy('score', 'DESC');
                break;
            case 'worst':
                $posts = $posts->orderBy('score', 'ASC');
                break;
            case 'new':
                $posts = $posts->orderBy('timePosted', 'DESC');
                break;
            default:
                $type = 'new';
                $posts = $posts->orderBy('timePosted', 'DESC');
        }

        switch ($state) {
            case 'hall':
                $posts = $posts->where('isPermanent',  1);
                break;
            case 'purgatory':
                $posts = $posts->where('isPermanent',  0);
                break;
            case 'all':
                break;
            default:
                $state = 'all';
                break;
        }


        if (isset($keywords)) {
            //Za svaku rec odvojenu razmakom
            $keywords = explode(' ', $keywords);
            foreach ($keywords as $keyword) {
                //Logicko grupisanje where klauzula
                $posts = $posts->where(function ($query) use ($keyword) {
                    $query->orWhere('content', 'like', '%' . $keyword . '%');
                    $query->orWhere('heading', 'like', '%' . $keyword . '%');
                });
            }
        }


        $searchParams = [
            'type' => $type,
            'state' => $state,
            'keywords' => isset($keywords) ? implode(' ', $keywords) : null,
        ];

        return $this->display($posts->get(), $searchParams);
    }

    /**
     *   Glasanje na odredjenoj objavi
     *  @param Request $request 
     *  @return JSON 
     */
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

    /**
     *   Prikaz forme za pisanje objave
     *  @param Request $request 
     *  @return Response
     */
    protected function showPostForm(Request $request)
    {
        return view('posts.write', []);
    }


    /**
     *   Prikaz konkretne objave u zasebnoj strani
     *  @param integer $request 
     *  @return Response
     */
    protected function showSpecificPost($id)
    {
        $authUser = Auth::user();
        $post = Post::findOrFail($id);
        $post->upvotes = count(Vote::all()->where('post', $id)->where('value', 1));
        $post->downvotes = count(Vote::all()->where('post', $id)->where('value', -1));
        $userVote = 0;
        if ($authUser) {
            $userVote = Vote::where('voter', $authUser->idUser)->where('post', $post->idPost)->first();
            $userVote = isset($userVote) ? $userVote->value : 0;
        }
        $post->userVote = $userVote;

        $author = User::find($post->author);
        $comments = CommentController::getComments($id);



        foreach ($comments as $comment) {
            $username = User::all()->where('idUser', $comment->commenter)->first()->username;

            $comment->username = $username;
        }

        return view('posts.post', compact(["post", "author", "comments"]));
    }



    /**
     * Pisanje nove objave
     *
     * @param  array  $data
     * @return Response
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

        return redirect('/');
    }


    //Autor: Vukašin Stepanović 2019/0133
    /**
     * Zakljucavanje objave od strane mod/admina
     *
     * @param  Request  $request
     * @param  integer  $id
     * @return JSON
     */
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