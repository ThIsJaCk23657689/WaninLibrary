<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AnnouncementService;

class HomeController extends Controller
{
    public $AnnouncementService;

    public function __construct(){
        $this->middleware('auth.web')->only('backend');
        $this->AnnouncementService = new AnnouncementService();
    }

    public function index(){
        $newsList = $this->AnnouncementService->getListForIndex();
        return view('frontend.index', compact('newsList'));
    }

    public function backend(){
        return view('backend');
    }
}
