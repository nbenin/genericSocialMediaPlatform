<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    //
    public function addFriend(Request $request)
    {
        Auth::user()->friends()->attach([$request->addFriend]);
    }

    public function removeFriend(Request $request)
    {
        Auth::user()->friends()->detach([$request->removeFriend]);
    }
}
