<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function store(Request $request)
    {
        // validate post
        $post = new Post;
        $post->user = Auth::user();
        $post->content = $request->postContent;
        $post->save();
    }
}
