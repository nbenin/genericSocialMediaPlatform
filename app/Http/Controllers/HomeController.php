<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

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
        // DB query for all the posts in order or newest post on top of list
        $allPosts = Post::with('user', 'comments')
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        return view('home', ['allPosts' => $allPosts]);
    }

    public function handleSubmits(Request $request)
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
