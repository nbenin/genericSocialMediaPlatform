<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        // add new comment to DB
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->commentForm;
        $comment->content = $request->commentContent;
        $comment->save();

        // Increase comment counter on the post
        $post = DB::table('posts')->where('id', $comment->post_id);
        $post->increment('comments');

    }

}
