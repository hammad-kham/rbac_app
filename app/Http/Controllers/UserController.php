<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_dashboard(){
        return view('user_dashboard');
    }

    public function admin_dashboard(){
        return view('user_dashboard');
    }

    public function manager_dashboard(){
        return view('user_dashboard');
    }
}
