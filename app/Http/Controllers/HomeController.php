<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth.web')->only('backend');
    }

    public function index(){
        return view('frontend.index');
    }

    public function backend(){
        return view('backend');
    }
}
