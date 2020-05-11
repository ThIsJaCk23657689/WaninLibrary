<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Services\InformationService;

class InformationController extends Controller
{
    public $InformationService;

    public function __construct(){
        $this->middleware('auth.web')->only([
            'show', 'edit', 
        ]);
        $this->middleware('auth.jwt')->only([
            'update'
        ]);
        $this->InformationService = new InformationService();
    }

    public function show(){
        $information = $this->InformationService->getFirst();
        return view('information.show', compact('information'));
    }

    public function edit(){
        $information = $this->InformationService->getFirst();
        return view('information.edit', compact('information'));
    }

    public function update(InformationRequest $request){
        $information_id = $this->InformationService->update($request);
        return response()->json([
            'status' => 'OK',
            'added_id' => $information_id,
            'url' => route('information.show', [$information_id])
        ], 200);
    }
}
