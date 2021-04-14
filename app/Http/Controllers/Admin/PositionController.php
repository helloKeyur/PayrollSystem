<?php

namespace App\Http\Controllers\Admin;

use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;

class PositionController extends Controller
{
    private $folder = "admin.position.";

    public function index()
    {
        $get_data = route($this->folder.'getData');
        return View($this->folder.'index',[
            'get_data' => $get_data
        ]);
    }
    
    public function getData()
    {
        $positions = Position::get();
        return View($this->folder.'content',[
            'positions'=>$positions,
            'add_new' => route($this->folder.'create'),
            'moveToTrashAllLink' => route($this->folder.'massDelete'),
        ]);
    }

    public function create()
    {
        return View($this->folder."create",[
            'form_store' => route($this->folder.'store'),
            ]);
    }

    public function store(PositionRequest $request)
    {
        $position = Position::create($request->all());

        return response()->json([
            'status'=>true,
            'message'=>'New Position created successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function show(Position $position)
    {
        abort(404);
    }

    public function edit(Position $position)
    {
    	return View($this->folder.'edit',[
    		'position' => $position,
    		'form_update' => route($this->folder.'update',['position'=>$position]),
    	]);
    }

    public function update(PositionRequest $request, Position $position)
    {
        $position->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Position '.$position->title.' updated successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return response()->json([
                'status' => true,
                'message' => "Your Record has been Deleted!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
    }

    public function massDelete(Request $request)
    {
        $positions = Position::whereIn('id',$request->ids)
                        ->delete();

        return response()->json([
                'status' => true,
                'message' => "Your all Record has been Deleted!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
    }
}
