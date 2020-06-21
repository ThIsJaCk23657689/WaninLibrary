<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UnreturnService;

class UnreturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.web')->only([
            'index', 'edit',
        ]);
        $this->middleware('auth.jwt')->only([
            'getList', 'getOne'
        ]);
        $this->middleware('admin.auth.jwt')->only([
            'update',
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
            'unreturns' => $unreturns['borrows'],
            'DataTotalCount' => $unreturns['DataTotalCount'],
        ]);
    }

    public function getOne($id)
    {
        $unreturn = $this->UnreturnService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'unreturn' => $unreturn,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unreturn = $this->UnreturnService->getOne($id);
        return view('circulation.unreturns.edit', compact('unreturn'));
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
        $result = $this->UnreturnService->update($request, $id);
        return response()->json([
            'status' => 'OK',
            'message' => $result['message'],
            'url' => route('unreturns.index')
        ], $result['status']);
    }
}
