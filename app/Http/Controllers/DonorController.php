<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DonorRequest;
use App\Services\DonorService;

class DonorController extends Controller
{
    public $DonorService;

    public function __construct(){
        //$this->middleware('auth');
        $this->DonorService = new DonorService();
    }

    public function index(){
        $donors = $this->DonorService->getList();
        return view('donors.index', compact('donors'));
    }

    public function create(){
        return view('donors.create');
    }

    public function store(DonorRequest $request){
        $donor_id = $this->DonorService->add($request);
        return response()->json([
            'status' => 'OK',
            'added_id' => $donor_id,
            'url' => route('donors.index')
        ], 200);
    }

    public function show($id){
        $donor = $this->DonorService->getOne($id);
        return view('donors.show', compact('donor'));
    }

    public function edit($id){
        $donor = $this->DonorService->getOne($id);
        return view('donors.edit', compact('donor'));
    }

    public function update(DonorRequest $request, $id){
        $donor_id = $this->DonorService->update($request, $id);
        return response()->json([
            'status' => 'OK',
            'added_id' => $donor_id,
            'url' => route('donors.show', [$donor_id])
        ], 200);
    }

    public function destroy($id){
        //日後注意是否有人在該群組底下，若有無法刪除
        $this->DonorService->delete($id);
        return  response()->json([
            'status' => 'OK',
            'url' => route('donors.index')
        ], 200);
    }

    // API
    public function getlist(){
        $donors = $this->DonorService->getList();
        return response()->json([
            'status' => 'OK',
            'donors' => $donors
        ]);
    }

    public function getOne($id){
        $donor = $this->DonorService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'donor' => $donor
        ]);
    }
}
