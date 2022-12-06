<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function group() {
        return view('group');
    }

    public function employee() {
        return view('employee');
    }

    public function product() {
        return view('product');
    }

    public function role() {
        return view('role');
    }
}
