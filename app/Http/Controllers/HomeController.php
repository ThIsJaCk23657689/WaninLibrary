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
        $active_num = 0;
        $newsList = $this->AnnouncementService->getListForIndex();
        $activities = $this->ActivityService->getListForIndex();
        $activities_top = $this->ActivityService->getListForIndex_top();
        $information = $this->InformationService->getListForIndex();
        $recommendation = $this->InformationService->recommendation_getFirst();
        $recommendation_books = $recommendation['books'];
        $recommendation_title = $recommendation['recommendation_title'];

        return view('frontend.index', compact('active_num', 'newsList', 'activities', 'activities_top', 'information', 'recommendation_books', 'recommendation_title'));
    }

    public function announcements(){
        $active_num = 1;
        return view('frontend.announcements', compact('active_num'));
    }

    public function activities(){
        $active_num = 2;
        return view('frontend.activities', compact('active_num'));
    }

    public function recommandations(){
        $active_num = 2;
        return view('frontend.recommandations', compact('active_num'));
    }

    public function books(){
        $active_num = 3;
        return view('frontend.books', compact('active_num'));
    }

    public function donors(){
        $active_num = 4;
        return view('frontend.donors', compact('active_num'));
    }

    public function donatedBooks(){
        $active_num = 4;
        return view('frontend.donatedBooks', compact('active_num'));
    }

    public function donations(){
        $active_num = 0;
        $information = $this->InformationService->getListForIndex();
        $donation_img = $information->donate_image;
        return view('frontend.donations', compact('active_num', 'donation_img'));
    }

    public function freeBooks(){
        $active_num = 0;
        return view('frontend.freeBooks', compact('active_num'));
    }

    public function backend(){
        return view('backend');
    }


}
