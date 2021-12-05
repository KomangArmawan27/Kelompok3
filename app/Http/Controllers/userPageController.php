<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userPageController extends Controller
{
    //
    public function userPage()
    {
        return view ('userPage');
    }
}
