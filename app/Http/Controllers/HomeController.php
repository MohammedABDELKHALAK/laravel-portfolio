<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all(); // Retrieves all users
        $totalUsers = $users->count(); // i use this to count users in user table 
                                       // to make a condition in welcome.blade.php 
                                       // to verify if ther is at least one user
        return view('welcome', [
            'user' => $totalUsers
        ]);
    }

    
}
