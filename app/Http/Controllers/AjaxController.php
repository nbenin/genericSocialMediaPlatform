<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //
    function removeFriend(Request $request)
    {
        $msg = $request->id;
        Auth::user()->friends()->detach([$msg]);
        return response()->json(array('msg'=> $msg), 200);
    }
}
