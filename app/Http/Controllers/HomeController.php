<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // DB query for all the posts in order or newest post on top of list
        $allPosts = Posts::with('user')
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        $allComments = DB::table('comments')
            ->orderBy('created_at', 'desc')
            ->get();

        $allUsers = User::all();
        foreach ($allPosts as $post) {
            echo $post->user->name;
        }

        return view('home', ['allPosts' => $allPosts, 'allComments' => $allComments, 'allUsers' => $allUsers]);
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
