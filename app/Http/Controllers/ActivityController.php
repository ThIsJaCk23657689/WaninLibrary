<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActivityRequest;
use App\Services\ActivityService;


class ActivityController extends Controller
{
    public $ActivityService;

    public function __construct(){
        $this->middleware('admin.auth.web')->only([
            'index', 'create', 'show', 'edit',
        ]);
        $this->middleware('admin.auth.jwt')->only([
            'store', 'update', 'destroy', 'getList', 'getOne', 'change_top'
        ]);
        $this->ActivityService = new ActivityService();
    }

    public function index(){
        $activities = $this->ActivityService->getList();
        return view('activities.index', compact('activities'));
    }

    public function create(){
        return view('activities.create');
    }

    public function store(ActivityRequest $request){
        $activity_id = $this->ActivityService->add($request);
        return response()->json([
            'status' => 'OK',
            'added_id' => $activity_id,
            'url' => route('activities.index')
        ], 200);
    }

    public function show($id){
        $activity = $this->ActivityService->getOne($id);
        return view('activities.show', compact('activity'));
    }

    public function edit($id){
        $activity = $this->ActivityService->getOne($id);
        return view('activities.edit', compact('activity'));
    }

    public function update(ActivityRequest $request, $id){
        $activity_id = $this->ActivityService->update($request, $id);
        return response()->json([
            'status' => 'OK',
            'added_id' => $activity_id,
            'url' => route('activities.show', [$activity_id])
        ], 200);
    }

    public function destroy($id){

        $this->ActivityService->delete($id);
        // return response()->json(['status'=>'OK','url'=>route('activities.index')],200);
        return redirect()->route('activities.index');
    }

    // API
    public function getList(){
        $activities = $this->ActivityService->getList();
        return response()->json([
            'status' => 'OK',
            'activities' => $activities
        ]);
    }

    public function getOne($id){
        $activity = $this->ActivityService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'activity' => $activity
        ]);
    }

    public function change_top($id){
        $this->ActivityService->change_top($id);
        return redirect()->route('activities.index');
    }
}
