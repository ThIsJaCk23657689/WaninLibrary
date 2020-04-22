<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth.web');
    }

    public function index(){
        return view('home');
    }

    public function backend(){
        return view('backend');
    }
}
