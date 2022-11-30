<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return view('home');
    }

    public function dashboard() {
        return view('dashboard');
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
