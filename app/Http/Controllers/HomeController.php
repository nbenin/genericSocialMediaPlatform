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
        $userFriends = User::with('friends')
            ->where('id', Auth::id())
            ->first();
        
        foreach ($userFriends->friends as $friend)
        {
            echo $friend->name;
        }

        // DB query for all the posts in order or newest post on top of list
        $allPosts = Post::with('user', 'comments')
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
