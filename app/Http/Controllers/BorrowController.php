<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BorrowService;

class BorrowController extends Controller
{
    public $BorrowService;

    public function __construct(){
        $this->middleware('auth.jwt');
        $this->BorrowService = new BorrowService();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
