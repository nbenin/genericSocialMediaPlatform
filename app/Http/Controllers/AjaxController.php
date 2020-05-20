<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    function removeFriend()
    {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }
}
