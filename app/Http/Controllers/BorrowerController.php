<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BorrowerRequest;
use App\Http\Requests\BorrowerUpdateRequest;
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
            'store', 'update', 'destroy', 'getList', 'getOne', 'filter',
        ]);
        $this->middleware('admin.auth.jwt')->only([
            'activate'
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

    public function update(BorrowerUpdateRequest $request, $id)
    {
        $this->validate($request, [
            'email' => [
                'nullable',
                'email',
                Rule::unique('borrowers')->ignore($id),
            ],
        ]);
        $borrower_id = $this->BorrowerService->update($request, $id);
        return response()->json([
            'status' => 'OK',
            'id' => $borrower_id,
            'url' => route('borrowers.show', [$borrower_id])
        ], 200);
    }

    public function activate(Request $request, $id)
    {
        // $request->validate([
        //     'id' => 'required|exist:borrowers,id',
        //     'content' => 'nullable|max:255|string',
        // ]);

        $borrower = $this->BorrowerService->activated($id);

        return response()->json([
            'status' => 'OK',
            'message' => $borrower
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
    public function nameIsInique(Request $request){
        $res = $this->BorrowerService->nameIsInique($request);
        return response()->json([
            'status' =>  $res['status'],
            'message' => $res['message']
        ], $res['status']);
    }

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
            'orderby' => [
                'nullable',
                Rule::in([1, 2, 0]), //  1.建立日期(舊->新) 2.建立日期(新->舊)
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

    // 這邊的借閱人搜尋是提供給書籍借出頁面中的(1.請選擇借閱人)所使用。
    public function filter(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|string|max:100',
            'tel' => 'nullable|string|max:30',
            'birthday' => 'nullable|string',
            'skip' => 'nullable|integer|',
            'take' => 'nullable|integer|max:100'
        ]);

        if(is_null($request->name) && is_null($request->tel) && is_null($request->birthday)){
            // 如果 搜尋欄位中的 姓名、電話、生日 三個欄位都為空值，就回傳 空陣列回去。
            return response()->json([
                'status' => 'OK',
                'count' => 0,
                'borrowers' => [],
            ]);
        }

        $result = $this->BorrowerService->filter($request);
        $borrowers = $result['borrowers'];
        foreach ($borrowers as $borrower){
            $borrower['getOneUrl'] = route('borrowers.getOne', [$borrower->id]);
        }

        if(!$result['totalCount'] || !$borrowers){
            // 如果查詢後沒有任何資料，回傳訊息告訴使用者。
            return [
                'status' => 'OK',
                'count' => $result['totalCount'],
                'borrowers' => $borrowers,
                'message' => '查無資料，換個關鍵字搜尋看看？'
            ];
        }

        return response()->json([
            'status' => 'OK',
            'count' => $result['totalCount'],
            'borrowers' => $borrowers,
        ]);
    }
}
