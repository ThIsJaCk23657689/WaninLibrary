<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BorrowerRequest;
use App\Services\BorrowerService;

class BorrowerController extends Controller
{
    public $BorrowerService;

    public function __construct(){
        $this->middleware('auth.web')->only([
            'index', 'create', 'show', 'edit', 
        ]);
        $this->middleware('auth.jwt')->only([
            'store', 'update', 'destroy', 'getList', 'getOne', 'activate'
        ]);
        $this->BorrowerService = new BorrowerService();
    }

    public function index(Request $request){
        $borrowers = $this->BorrowerService->getList($request->skip, $request->take);
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
        return response()->json([
            'status' => 'OK',
            'id' => $borrower_id,
            'url' => route('borrowers.show', [$borrower_id])
        ], 200);
    }

    public function activate(Request $request)
    {
        $request->validate([
            'id' => 'required|exist:borrowers,id',
            'content' => 'nullable|max:255|string',
        ]);

        $borrower = $this->BorrowerService->activated($request);

        return response()->json([
            'status' => 'OK',
            'massage' => $borrower
        ], 200);

    }

    public function destroy($id){
        $this->BorrowerService->delete($id);
        return  response()->json([
            'status' => 'OK',
            'url' => route('borrowers.index')
        ], 200);
    }

    // API
    public function getList(Request $request){
        $borrowers = $this->BorrowerService->getList($request->skip, $request->take);
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
