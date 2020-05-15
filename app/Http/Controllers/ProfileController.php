<?php

namespace App\Http\Controllers;

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
        $userPosts = DB::table('posts')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        $

        return view('profile', ['user' => Auth::user(), 'userPosts' => $userPosts]);
    }
}
