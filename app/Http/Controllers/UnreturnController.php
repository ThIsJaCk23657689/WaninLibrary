<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UnreturnService;

class UnreturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.web')->only([
            'index', 'create', 'show', 'edit',
        ]);
        $this->middleware('auth.jwt')->only([
            'getList',
        ]);
        $this->UnreturnService = new UnreturnService();
    }
    
    public function index()
    {
        $totalPage = $this->UnreturnService->count();
        return view('circulation.unreturns.index', compact('totalPage'));
    }

    public function getList(Request $request)
    {
        $unreturns = $this->UnreturnService->getList($request);
        return response()->json([
            'status' => 'OK',
            'unreturns' => $unreturns
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
