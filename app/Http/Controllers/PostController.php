<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function store(Request $request)
    {
        // validate post
        $post = new Post;
        $post->user_id = Auth::id();
        $post->content = $request->postContent;
        $post->save();

        // DB query for all the posts in order or newest post on top of list
        $allPosts = DB::table('posts')
            ->select('user_id', 'content')
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        return view('home', ['allPosts' => $allPosts]);
    }
}
