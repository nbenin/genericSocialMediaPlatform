<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    //
    public function addFriend($id)
    {
        $user = User::find(Auth::id());
        $user->friend_id = $id;
        $user->save();
    }
}
