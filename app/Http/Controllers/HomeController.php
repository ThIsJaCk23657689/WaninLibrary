<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AnnouncementService;
use App\Services\ActivityService;
use App\Services\InformationService;

class HomeController extends Controller
{
    public $AnnouncementService;
    public $ActivityService;
    public $InformationService;

    public function __construct(){
        $this->middleware('auth.web')->only('backend');
        $this->AnnouncementService = new AnnouncementService();
        $this->ActivityService = new ActivityService();
        $this->InformationService = new InformationService();
    }

    public function index(){
        $newsList = $this->AnnouncementService->getListForIndex();
        $activities = $this->ActivityService->getListForIndex();
        $activities_top = $this->ActivityService->getListForIndex_top();
        $information = $this->InformationService->getListForIndex();
        $recommendation = $this->InformationService->recommendation_getFirst();
        $recommendation_books = $recommendation['books'];
        $recommendation_title = $recommendation['recommendation_title'];

        return view('frontend.index', compact('newsList', 'activities', 'activities_top', 'information', 'recommendation_books', 'recommendation_title'));
    }

    public function backend(){
        return view('backend');
    }


}
