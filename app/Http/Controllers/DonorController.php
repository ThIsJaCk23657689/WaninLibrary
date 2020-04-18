<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DonorRequest;
use App\Services\DonorService;


class DonorController extends Controller
{
    public $DonorService;


    public function __construct()
    {
        $this->middleware('auth');
        $this->DonorService = new DonorService();
    }
    public function index()
    {
        $donors = $this->DonorService->getList();
        return view('donors.index', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonorRequest $request)
    {
        $donor_id = $this->DonorService->add($request);
        return response()->json(['status'=>'OK','added_id'=>$donor_id,'url'=>route('donors.index')],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donor = $this->DonorService->getOne($id);
        return view('donors.show', compact('donor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donor = $this->DonorService->getOne($id);
        return view('donors.edit', compact('donor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonorRequest $request, $id)
    {
        $donor_id = $this->DonorService->update($request, $id);
        return response()->json(['status'=>'OK','added_id'=>$donor_id,'url'=>route('donors.show',[$donor_id])],200);
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
        $this->DonorService->delete($id);
        return  response()->json(['status'=>'OK','url'=>route('donors.index')],200);
    }
}
