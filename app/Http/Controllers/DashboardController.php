<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // shows friends and available friends
    public function index()
    {
        $otherUsers = User::with('friends')->where('id','!=', Auth::id())->get();
        $friends = Auth::user()->friends();
        $notFriends = $otherUsers;

        return view('dashboard', ['notFriends' => $notFriends]);
    }

    public function addFriend($id)
    {
        $user = User::where('id', $id);
        echo $user;
        return view('dashboard');
    }

    public function removeFriend($id)
    {
        return view('dashboard');
    }
}
