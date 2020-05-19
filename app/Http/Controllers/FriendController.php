<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    //
    public function addFriend($friendId)
    {
        Auth::user()->friends()->attach([$friendId]);
    }

    public function removeFriend($friendId)
    {
        Auth::user()->friends()->detach([$friendId]);
    }
}
