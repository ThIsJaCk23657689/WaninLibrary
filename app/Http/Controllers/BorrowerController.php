<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BorrowerRequest;
use App\Services\BorrowerService;
use App\Services\BookService as BookService;
use Illuminate\Validation\Rule;

class BorrowerController extends Controller
{
    public $BorrowerService;
    public $BookService;

    public function __construct()
    {
        $this->middleware('auth.web')->only([
            'index', 'create', 'show', 'edit',
        ]);
        $this->middleware('auth.jwt')->only([
            'store', 'update', 'destroy', 'getList', 'getOne', 'activate', 'filter'
        ]);
        $this->BorrowerService = new BorrowerService();
        $this->BookService = new BookService();
    }

    public function index()
    {
        return view('borrowers.index');
    }

    public function create()
    {
        return view('borrowers.create');
    }

    public function store(BorrowerRequest $request)
    {
        $borrower_id = $this->BorrowerService->add($request);
        return response()->json([
            'status' => 'OK',
            'added_id' => $borrower_id,
            'url' => route('borrowers.index')
        ], 200);
    }

    public function show($id)
    {
        $borrower = $this->BorrowerService->getOne($id);
        return view('borrowers.show', compact('borrower'));
    }

    public function edit($id)
    {
        $borrower = $this->BorrowerService->getOne($id);
        return view('borrowers.edit', compact('borrower'));
    }

    public function update(BorrowerRequest $request, $id)
    {
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

    public function destroy($id)
    {
        $this->BorrowerService->delete($id);
        return  response()->json([
            'status' => 'OK',
            'url' => route('borrowers.index')
        ], 200);
    }

    // API
    public function getList(Request $request)
    {
        $this->validate($request, [
            'skip' => 'nullable|integer|',
            'take' => 'nullable|integer|max:100',
            'type' => [
                'nullable',
                Rule::in([1, 2, 3, 4, 0]), // 0. default 1.'agency_id', 2.'name', 3. 'email', 4. 'tel'
            ],
            'status' => [
                'nullable',
                Rule::in([1, 2, 0]), // 0.一般民眾 1.符合社福資格 2.全部
            ],
            'activated' => [
                'nullable',
                Rule::in([1, 2, 0]), // 0.停權 1.未停權 2.全部
            ],
            'keywords' => 'nullable',
        ]);

        $res = $this->BorrowerService->getList($request);

        return response()->json([
            'status' => 'OK',
            'DataTotalCount' => $res['count'],
            'borrowers' => $res['borrowers']
        ]);
    }

    public function getOne(Request $request, $id)
    {
        $borrower = $this->BorrowerService->getOne($id);
        if(!is_null($request->with)){
            $borrows = $borrower->borrows;
            // $borrower = $this->BorrowerService->getOneWithRelation($id, $request->with);
            foreach($borrows as $borrow){
                $book = $this->BookService->getOne($borrow->book_id);
                $borrow['book_barcode'] = $book->barcode;
                $borrow['book_title'] = $book->title;
                $borrow['showStatus'] = $borrow->showStatus();
            }
        }

        $borrower['showAgencyName'] = $borrower->showAgencyName();
        $borrower['showStatus'] = $borrower->showStatus();
        $borrower['showActivated'] = $borrower->showActivated();

        return response()->json([
            'status' => 'OK',
            'borrower' => $borrower
        ]);
    }

    public function filter(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|string|max:100',
            'tel' => 'nullable|string|max:30',
            'birthday' => 'nullable|string',
            'skip' => 'nullable|integer|',
            'take' => 'nullable|integer|max:100'
        ]);

        $result = $this->BorrowerService->filter($request);
        $borrowers = $result['borrowers'];
        foreach ($borrowers as $borrower){
            $borrower['getOneUrl'] = route('borrowers.getOne', [$borrower->id]);
        }

        return response()->json([
            'status' => 'OK',
            'count' => $result['totalCount'],
            'borrowers' => $borrowers,
        ]);
    }
}
