<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
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

    // Display the profile
    public function index()
    {
        // query for user specific posts
        $user = User::with('posts')
            ->where('id', Auth::id())
            ->first();

        return view('profile', ['user' => $user]);
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
