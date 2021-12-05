<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        if(Auth::check(1)){
            return view('admin');
          }
           return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }
    
    public function user()
    {
        if(Auth::check(0)){
            return view('user');
          }
           return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

}
