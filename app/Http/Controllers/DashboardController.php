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
        $notFriends = User::where('id', '!=', Auth::id())
            ->get();

        if (Auth::user()->friends->count())
        {
            $notFriends = $notFriends->whereNotIn('id', Auth::user()->friends->modelKeys());
        }

        return view('dashboard', ['notFriends' => $notFriends]);
    }

    // for friend requests and removal
    public function handleSubmit(Request $request)
    {
        $controller = new FriendController();

        if ($request->has('addFriend'))
        {
            $controller->addFriend($request);
        }
        if ($request->has('removeFriend'))
        {
            $controller->removeFriend($request);
        }

        return $this->index();
    }
}
