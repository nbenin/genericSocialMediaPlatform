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
        $post->comments = 0;
        $post->save();
    }
}
