<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', ['title' => 'Dashboard']);
    }
    public function about()
    {
        return view('about', ['title' => 'About']);
    }
    // --- IGNORE ---
    public function contact()
    {
        return view('contact', ['title' => 'Contact Us']);
    }
}
