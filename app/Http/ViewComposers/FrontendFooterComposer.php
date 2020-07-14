<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\InformationService;

class FrontendFooterComposer
{
    public $InformationService;

    public function __construct(){
        $this->InformationService = new InformationService();
    }

    public function compose(View $view){
        $information = $this->InformationService->getListForIndex();
        $view->with('information', $information);
    }
}
