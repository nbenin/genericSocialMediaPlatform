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
        $allPosts = DB::table('posts')
            ->select('user_id', 'content')
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        return view('home', ['allPosts' => $allPosts]);
    }
}
