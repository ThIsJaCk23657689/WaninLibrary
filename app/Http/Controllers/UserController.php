<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\JWTAuthService;

class UserController extends Controller
{

    public $UserService;

    public function __construct(){
        $this->middleware('admin.auth.jwt')->except([
            'getUserByToken', 'index', 'create', 'show', 'edit'
        ]);

        $this->middleware('admin.auth.web')->only([
            'index', 'create', 'show', 'edit',
        ]);

        $this->JWTAuthService = new JWTAuthService();
        $this->UserService = new UserService();
    }

    /*---回傳view---*/
    public function index()
    {
        $users_arr = $this->UserService->getList();
        $users = $users_arr['users'];
        $users_block = $users_arr['users_block'];
        return view('users.index', compact('users', 'users_block'));
    }

    // public function usersByName(Request $request){
    //     $name = $request->name;
    //     $users = $this->UserService->getUsersByName($name);
    //     return view('users.index', compact('users'));
    // }

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
        $msg = $this->JWTAuthService->register($request);
        return response()->json([$msg, 'url'=>route('users.index')], 200);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $msg = $this->UserService->update($request, $id);
        return response()->json($msg, 200);
    }

    public function destroy($id)
    {
        $msg = $this->UserService->delete($id);
        return redirect()->route('users.index');
        // return  response()->json($msg, 200);
    }

    public function forceDestroy($id)
    {
        $msg = $this->UserService->forceDestroy($id);
        return redirect()->route('users.index');
        // return  response()->json($msg, 200);
    }

    public function getOne($id){
        $user = $this->UserService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'user' => $user
        ]);
    }
}
