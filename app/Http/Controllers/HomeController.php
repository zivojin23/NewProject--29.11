<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function home() {
        return view('home');
    }

    public function dashboard() 
    {
        $user = auth()->user();
        
        return view('dashboard', compact('user'));
    }

    public function allUsers() 
    {
        $users = User::all();
        
        return view('system.users', compact('users'));
    }
}
