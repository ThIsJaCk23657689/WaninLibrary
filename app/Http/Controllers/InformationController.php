<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecommendationRequest;
use App\Http\Requests\InformationRequest;
use App\Services\InformationService;
use Illuminate\Http\Request;


class InformationController extends Controller
{
    public $InformationService;

    public function __construct(){
        $this->middleware('admin.auth.web')->only([
            'index', 'edit',
            'recommendation_index', 'recommendation_edit',
        ]);
        $this->middleware('admin.auth.jwt')->only([
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

    public function getFirst(){
        $information = $this->InformationService->getFirst();
        return response()->json([
            'status' => 'OK',
            'information' => $information
        ]);
    }

    public function recommendation_index(){
        $recommendation = $this->InformationService->recommendation_getFirst();
        $recommendation_title = $recommendation['recommendation_title'];
        $books = $recommendation['books'];
        return view('recommendation.index', compact('recommendation_title', 'books'));
    }

    public function recommendation_edit(){
        $recommendation = $this->InformationService->recommendation_getFirst();
        return view('recommendation.edit', compact('recommendation'));
    }

    public function recommendation_getFirst(){
        $recommendation = $this->InformationService->recommendation_getFirst();
        $recommendation_title = $recommendation['recommendation_title'];
        $books = $recommendation['books'];
        return response()->json([
            'status' => 'OK',
            'recommendation_title' => $recommendation_title,
            'books' => $books,

        ]);
    }

    public function recommendation_update(RecommendationRequest $request){
        $this->InformationService->recommendation_update($request);
        return response()->json([
            'status' => 'OK',
            // 'added_id' => $information_id,
            'url' => route('recommendation.index')
        ], 200);
    }

    public function recommendation_getBooksByName(Request $request){
        $book_list= $this->InformationService->recommendation_getBooksByName($request);
        return response()->json([
            'status' => 'OK',
            'book_list' => $book_list
        ], 200);
    }


}
