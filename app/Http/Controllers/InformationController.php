<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecommendationRequest;
use App\Http\Requests\InformationRequest;
use App\Services\InformationService;


class InformationController extends Controller
{
    public $InformationService;

    public function __construct(){
        $this->middleware('auth.web')->only([
            'index', 'edit', 
            'recommendation_index', 'recommendation_edit',
        ]);
        $this->middleware('auth.jwt')->only([
            'getFirst', 'update', 'recommendation_update'
        ]);
        $this->InformationService = new InformationService();
    }

    public function index(){
        $information = $this->InformationService->getFirst();
        return view('information.index', compact('information'));
    }

    public function edit(){
        $information = $this->InformationService->getFirst();
        return view('information.edit', compact('information'));
    }

    public function update(InformationRequest $request){
        $information_id = $this->InformationService->update($request);
        return response()->json([
            'status' => 'OK',
            // 'added_id' => $information_id,
            'url' => route('information.index')
        ], 200);
    }

    public function recommendation_index(){
        $information = $this->InformationService->recommendation_getFirst();
        return view('recommendation.index', compact('information'));
    }

    public function recommendation_edit(){
        $information = $this->InformationService->recommendation_getFirst();
        return view('recommendation.edit', compact('information'));
    }

    public function recommendation_update(InformationRequest $request){
        $information_id = $this->InformationService->update($request);
        return response()->json([
            'status' => 'OK',
            // 'added_id' => $information_id,
            'url' => route('recommendation.index')
        ], 200);
    }

    public function getFirst(){
        $information = $this->InformationService->getFirst();
        return response()->json([
            'status' => 'OK',
            'information' => $information
        ]);
    }
}
