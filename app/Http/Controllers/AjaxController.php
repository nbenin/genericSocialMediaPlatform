<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //
    function removeFriend(Request $request)
    {
        $friendId = $request->id;
        Auth::user()->friends()->detach([$friendId]);
        return response()->json(array('friendId'=> $friendId), 200);
    }
}
