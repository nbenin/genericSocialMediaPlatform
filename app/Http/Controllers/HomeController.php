<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {

        // Array used to filter home page with only posts from friends
        $userSpecificFeed = array(Auth::id());

        foreach (Auth::user()->friends as $friend)
        {
            array_push($userSpecificFeed, $friend->id);
        }


        // DB query for all the posts in order or newest post on top of list
        $allPosts = Post::with('user', 'comments')
            ->whereIn('user_id', $userSpecificFeed)
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();


        return view('home', ['allPosts' => $allPosts]);
    }

    public function handleSubmit(Request $request)
    {
        if ($request->has('postForm')) {
            $postController = new PostController();
            $postController->store($request);
        }
        if ($request->has('commentForm')) {
            $commentController = new CommentController();
            $commentController->store($request);
        }
        return $this->index();
    }
}
