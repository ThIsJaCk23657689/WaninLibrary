<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgencyRequest;
use App\Services\AgencyService;

class AgencyController extends Controller
{
    public $AgencyService;

    public function __construct(){
        $this->middleware('auth.web')->only([
            'index', 'create', 'edit', 'show'
        ]);
        $this->AgencyService = new AgencyService();
    }

    public function index(){
        $agencies = $this->AgencyService->getList();
        return view('agencies.index', compact('agencies'));
    }

    public function create(Request $request){


        // return response()->json($_COOKIE["authorization"]);
        return view('agencies.create');
    }

    public function store(Request $request){
        return 'd';
        // $agency_id = $this->AgencyService->add($request);
        // return response()->json([
        //     'status' => 'OK',
        //     'added_id' => $agency_id,
        //     'url' => route('agencies.index')
        // ], 200);
    }

    public function show($id){
        $agency = $this->AgencyService->getOne($id);
        return view('agencies.show', compact('agency'));
    }

    public function edit($id){
        $agency = $this->AgencyService->getOne($id);
        return view('agencies.edit', compact('agency'));
    }

    public function update(AgencyRequest $request, $id){
        $agency_id = $this->AgencyService->update($request, $id);
        return response()->json([
            'status' => 'OK',
            'added_id' => $agency_id,
            'url' => route('agencies.show', [$agency_id])
        ], 200);
    }

    public function destroy($id){
        //日後注意是否有人在該群組底下，若有無法刪除
        $this->AgencyService->delete($id);
        // return response()->json(['status'=>'OK','url'=>route('agencies.index')],200);
        return redirect()->route('agencies.index');
    }

    // API
    public function getlist(){
        $agencies = $this->AgencyService->getList();
        return response()->json([
            'status' => 'OK',
            'agencies' => $agencies
        ]);
    }

    public function getOne($id){
        $agency = $this->AgencyService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'agency' => $agency
        ]);
    }
}
