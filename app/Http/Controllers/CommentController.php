<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->commentForm;
        $comment->content = $request->commentContent;
        $comment->save();
    }

}
