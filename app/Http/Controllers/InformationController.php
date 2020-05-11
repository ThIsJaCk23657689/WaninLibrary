<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Services\InformationService;

class InformationController extends Controller
{
    public $InformationService;

    public function __construct(){
        $this->middleware('auth.web')->only([
            'index', 'edit',
        ]);
        $this->middleware('auth.jwt')->only([
            'update'
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

    public function getOne($id){
        $information = $this->InformationService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'information' => $information
        ]);
    }
}
