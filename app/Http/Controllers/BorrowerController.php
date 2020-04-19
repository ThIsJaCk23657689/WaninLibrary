<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BorrowerRequest;
use App\Services\BorrowerService;

class BorrowerController extends Controller
{
    public $BorrowerService;

    public function __construct(){
        //$this->middleware('auth');
        $this->BorrowerService = new BorrowerService();
    }

    public function index(){
        $borrowers = $this->BorrowerService->getList();
        return view('borrowers.index', compact('borrowers'));
    }

    public function create(){
        return view('borrowers.create');
    }

    public function store(BorrowerRequest $request){
        $borrower_id = $this->BorrowerService->add($request);
        return response()->json([
            'status' => 'OK',
            'added_id' => $borrower_id,
            'url' => route('borrowers.index')
        ], 200);
    }

    public function show($id){
        $borrower = $this->BorrowerService->getOne($id);
        return view('borrowers.show', compact('borrower'));
    }

    public function edit($id){
        $borrower = $this->BorrowerService->getOne($id);
        return view('borrowers.edit', compact('borrower'));
    }

    public function update(BorrowerRequest $request, $id){
        $borrower_id = $this->BorrowerService->update($request, $id);
        return response()->json(['status' => 'OK','added_id' => $borrower_id,'url' => route('borrowers.show',[$borrower_id])],200);
    }

    public function destroy($id){
        $this->BorrowerService->delete($id);
        return  response()->json(['status' => 'OK','url' => route('borrowers.index')],200);
    }

    // API
    public function getlist(){
        $borrowers = $this->BorrowerService->getList();
        return response()->json([
            'status' => 'OK',
            'borrowers' => $borrowers
        ]);
    }

    public function getOne($id){
        $borrower = $this->BorrowerService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'borrower' => $borrower
        ]);
    }
}
