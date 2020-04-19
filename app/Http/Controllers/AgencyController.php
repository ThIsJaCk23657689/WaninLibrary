<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgencyRequest;
use App\Services\AgencyService;

class AgencyController extends Controller
{
    public $AgencyService;

    public function __construct(){
        // $this->middleware('auth');
        $this->AgencyService = new AgencyService();
    }

    public function index(){
        $agencies = $this->AgencyService->getList();
        return view('agencies.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgencyRequest $request)
    {
        $agency_id = $this->AgencyService->add($request);
        return response()->json(['status'=>'OK','added_id'=>$agency_id,'url'=>route('agencies.index')],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agency = $this->AgencyService->getOne($id);
        return view('agencies.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = $this->AgencyService->getOne($id);
        return view('agencies.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgencyRequest $request, $id)
    {
        $agency_id = $this->AgencyService->update($request, $id);
        return response()->json(['status'=>'OK',
                                'added_id'=>$agency_id,
                                'url'=>route('agencies.show',[$agency_id])],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
