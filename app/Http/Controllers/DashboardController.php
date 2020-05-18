<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // shows friends and available friends
    public function index()
    {
        return view('dashboard');
    }
}
