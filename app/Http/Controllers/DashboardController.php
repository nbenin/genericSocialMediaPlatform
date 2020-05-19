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
        $notFriends = User::with('friends')->where('id','!=', Auth::id())->get();

        return view('dashboard', ['notFriends' => $notFriends]);
    }

    // for friend requests and removal
    public function handleSubmit(Request $request)
    {
        $controller = new FriendController();

        if ($request->has('addFriend'))
        {
            $friendId = $request->addFriend;
            $controller->addFriend($friendId);
        }
        if ($request->has('removeFriend'))
        {
            $friendId = $request->removeFriend;
            $controller->removeFriend($friendId);
        }

        $notFriends = User::with('friends')->where('id','!=', Auth::id())->get();
        return view('dashboard', ['notFriends' => $notFriends]);
    }
}
