<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BorrowerRequest;
use App\Services\BorrowerService;

class BorrowerController extends Controller
{
    public $BorrowerService;


    public function __construct()
    {
        $this->middleware('auth');
        $this->BorrowerService = new BorrowerService();
    }
    public function index()
    {
        $borrowers = $this->BorrowerService->getList();
        return view('borrowers.index', compact('borrowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrowers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowerRequest $request)
    {
        $borrower_id = $this->BorrowerService->add($request);
        return response()->json(['status'=>'OK','added_id'=>$borrower_id,'url'=>route('borrowers.index')],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrower = $this->BorrowerService->getOne($id);
        return view('borrowers.show', compact('borrower'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrower = $this->BorrowerService->getOne($id);
        return view('borrowers.edit', compact('borrower'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowerRequest $request, $id)
    {
        $borrower_id = $this->BorrowerService->update($request, $id);
        return response()->json(['status'=>'OK','added_id'=>$borrower_id,'url'=>route('borrowers.show',[$borrower_id])],200);
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
        $this->BorrowerService->delete($id);
        return  response()->json(['status'=>'OK','url'=>route('borrowers.index')],200);
    }
}
