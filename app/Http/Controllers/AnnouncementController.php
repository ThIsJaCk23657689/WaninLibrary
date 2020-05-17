<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AnnouncementService;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public $AnnouncementService;

    public function __construct(){
        $this->middleware('auth.web')->only([
            'index', 'create', 'show', 'edit',
        ]);
        $this->middleware('auth.jwt')->only([
            'store', 'update', 'destroy', 'change_top'
        ]);
        $this->AnnouncementService = new AnnouncementService();
    }
    public function index(){
        $announcements = $this->AnnouncementService->getList();
        return view('announcements.index', compact('announcements'));
    }

    public function create(){
        return view('announcements.create');
    }

    public function store(AnnouncementRequest $request){
        $announcement_id = $this->AnnouncementService->add($request);
        return response()->json([
            'status' => 'OK',
            'added_id' => $announcement_id,
            'url' => route('announcements.index')
        ], 200);
    }

    public function show($id){
        $announcement = $this->AnnouncementService->getOne($id);
        return view('announcements.show', compact('announcement'));
    }

    public function edit($id){
        $announcement = $this->AnnouncementService->getOne($id);
        return view('announcements.edit', compact('announcement'));
    }

    public function update(AnnouncementRequest $request, $id){
        $announcement_id = $this->AnnouncementService->update($request, $id);
        return response()->json([
            'status' => 'OK',
            'added_id' => $announcement_id,
            'url' => route('announcements.show', [$announcement_id])
        ], 200);
    }

    public function destroy($id){
        $this->AnnouncementService->delete($id);
        return redirect()->route('announcements.index');
    }

    public function change_top($id){
        $this->AnnouncementService->change_top($id);
        return redirect()->route('announcements.index');
    }


    public function getOne($id){
        $announcement = $this->AnnouncementService->getOne($id);
        return response()->json([
            'status' => 'OK',
            'announcement' => $announcement
        ]);
    }
}
