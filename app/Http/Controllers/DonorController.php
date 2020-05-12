<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DonorRequest;
use App\Services\DonorService;

class DonorController extends Controller
{
    public $DonorService;

    public function __construct(){
        $this->middleware('auth.web')->only([
            'index', 'create', 'show', 'edit',
        ]);
        $this->middleware('auth.jwt')->only([
            'store', 'update', 'destroy', 'getList', 'getOne',
        ]);
        $this->DonorService = new DonorService();
    }

    public function index(Request $request){
        // $DataTotalCount = $this->DonorService->count();
        return view('donors.index');
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
    public function getList(Request $request){
        $this->validate($request, [
            'type' => 'nullable|integer|', // 0.(default)全部 2.依姓名 3.依照電話 4.手機 5. 信箱
            'keywords' => 'nullable|string|',
            'exposure' => 'nullable|integer|', //(default)0.all  1.完全公開 2.半公開 3.前台不曝光
            'skip' => 'nullable|integer|',
            'take' => 'nullable|integer|max:100'
        ]);

        $result = $this->DonorService->getList($request);

        return response()->json([
            'status' => 'OK',
            'donors' => $result['donors'],
            'DataTotalCount' => $result['count']
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
