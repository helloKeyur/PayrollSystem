<?php

namespace App\Http\Controllers\Admin;

use App\Deduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeductionRequest;

class DeductionController extends Controller
{
    private $folder = "admin.deduction.";

    public function index()
    {
        $get_data = route($this->folder.'getData');
        return View($this->folder.'index',[
            'get_data' => $get_data,
        ]);
    }
    
    public function getData()
    {
        $deductions = Deduction::get();
        return View($this->folder.'content',[
            'deductions'=>$deductions,
            'add_new' => route($this->folder.'create'),
            'sum' => Deduction::sum('amount'),
            'moveToTrashAllLink' => route($this->folder.'massDelete'),
        ]);
    }

    public function create()
    {
        return View($this->folder."create",[
            'form_store' => route($this->folder.'store'),
            ]);
    }

    public function store(DeductionRequest $request)
    {
        $deduction = Deduction::create($request->all());

        return response()->json([
            'status'=>true,
            'message'=>'New Deduction created successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function show(Deduction $deduction)
    {
        abort(404);
    }

    public function edit(Deduction $deduction)
    {
    	return View($this->folder.'edit',[
    		'deduction' => $deduction,
    		'form_update' => route($this->folder.'update',['deduction'=>$deduction]),
    	]);
    }

    public function update(DeductionRequest $request, Deduction $deduction)
    {
        $deduction->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Deduction '.$deduction->name.' updated successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function destroy(Deduction $deduction)
    {
        $deduction->delete();
        return response()->json([
                'status' => true,
                'message' => "Your Record has been Deleted!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
    }

    public function massDelete(Request $request)
    {
        $deductions = Deduction::whereIn('id',$request->ids)
                        ->delete();

        return response()->json([
                'status' => true,
                'message' => "Your all Record has been Deleted!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
    }
}