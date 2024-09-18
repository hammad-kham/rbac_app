<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function admin_dashboard()
    {
     
        
        // Return the admin dashboard view
        return view('admin_dashboard');
    }

    public function user_dashboard()
    {
        
        
        // Return the user dashboard view
        return view('user_dashboard');
    }

    public function manager_dashboard()
    {
       
        
        // Return the manager dashboard view
        return view('manager_dashboard');
    }
}
