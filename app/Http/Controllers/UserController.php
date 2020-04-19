<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{

    public $UserService;

    public function __construct(){
        $this->middleware('admin.auth.jwt')->except('getUserByToken');
        $this->UserService = new UserService();
    }

    /*---回傳view---*/
    public function index()
    {
        $users = $this->UserService->getList();
        return view('users.index', compact('users'));
    }

    public function usersByName(Request $request){
        $name = $request->name;
        $users = $this->UserService->getUsersByName($name);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show($id)
    {
        $user = $this->UserService->getOne($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->UserService->getOne($id);
        return view('users.edit', compact('user'));
    }

     /*---回傳view---end*/
     /* API */

    public function getUserByToken(){
        $user = $this->UserService->getUserByToken();
        return response()->json($user, 200);
    }

    public function getUsersByName(Request $request){
        $name = $request->name;
        $users = $this->UserService->getUsersByName($name);
        return response()->json($users, 200);
    }


    public function store(UserRequest $request)
    {
        $msg = $this->UserService->add($request);
        return response()->json($msg, 200);
    }

    public function update(UserRequest $request, $id)
    {
        $msg = $this->UserService->update($request, $id);
        return response()->json($msg, 200);
    }

    public function destroy($id)
    {
        $msg = $this->UserService->delete($id);
        return  response()->json($msg, 200);
    }

}
