<?php

namespace App\Http\Controllers\Admin;

use App\{Employee,Overtime};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OvertimeRequest;
use DataTables;;

class OvertimeController extends Controller
{
    private $folder = "admin.overtime.";

    public function index()
    {
        return View($this->folder.'index',[
            'get_data' => route($this->folder.'getData'),
        ]);
    }

    public function getData(){
        return View($this->folder.'content',[
            'add_new' => route($this->folder.'create'),
            'getDataTable' => route($this->folder.'getDataTable'),
            'moveToTrashAllLink' => route($this->folder.'massDelete'),
        ]);
    }

    public function getDataTable(){
        $overtimes = Overtime::get();
        return Datatables::of($overtimes)
                    ->addIndexColumn()
                    ->addColumn('employee', function($data){
                    	return "<div class='row'><div class='col-md-3 text-center'><img src='".$data->employee->media_url['thumb']."' class='rounded-circle table-user-thumb'></div><div class='col-md-6 col-lg-6 my-auto'><b class='mb-0'>".$data->employee->first_name." ".$data->employee->last_name."</b><p class='mb-2' title='".$data->employee->employee_id."'><small><i class='ik ik-at-sign'></i>".$data->employee->employee_id."</small></p></div><div class='col-md-4 col-lg-4'><small class='text-muted float-right'></small></div></div>";
                    })
                    ->addColumn('details', function($data){
                        return "<b>".$data->title."</b><p>".$data->description."</p>";
                    })
                    ->addColumn('hour_in', function($data){
                        return hoursandmins($data->hour)."/hr";
                    })
                    ->addColumn('action', function($data){
                            $btn = "<div class='table-actions'>
                            <a href='".route($this->folder."edit",['slug'=>$data->slug])."'><i class='ik ik-edit-2 text-dark'></i></a>
                            <a data-href='".route($this->folder."destroy",['slug'=>$data->slug])."' class='delete cursure-pointer'><i class='ik ik-trash-2 text-danger'></i></a>
                            </div>";
                            return $btn;
                    })
                    ->rawColumns(['employee','action','details'])
                    ->toJson();
    }

    public function create()
    {   
        $employees = Employee::get();
        return View($this->folder."create",[
            'form_store' => route($this->folder.'store'),
            'employees' => $employees,
        ]);
    }
    
    public function store(OvertimeRequest $request)
    {   
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'rate_amount' => $request->rate_amount,
            'hour' => $request->hour,
            'date' => $request->date,
            'employee_id' => $request->employee_id,
        ];
        $overtime = Overtime::create($data);

        return response()->json([
            'status'=>true,
            'message'=>'New Overtime added successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function show(Overtime $overtime){   
        abort(404);
    }

    public function edit(Overtime $overtime)
    {
        $employees = Employee::get();
        return View($this->folder.'edit',[
            'overtime' => $overtime,
            'form_update' => route($this->folder.'update',['overtime'=>$overtime]),
            'employees' => $employees,
        ]);
    }

    public function update(OvertimeRequest $request, Overtime $overtime)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'rate_amount' => $request->rate_amount,
            'hour' => $request->hour,
            'date' => $request->date,
            'employee_id' => $request->employee_id,
        ];
        $overtime->update($data);

        return response()->json([
            'status'=>true,
            'message'=> $overtime->title.' updated successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function destroy(Overtime $overtime)
    {   
        $trash = $overtime->delete();
        if($trash){
            return response()->json([
                'status' => true,
                'message' => "Your Record has been Permanent Delete!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "Something went wrong please try later!",
            'getDataUrl' => route($this->folder.'getData'),
        ]);
    }

    public function massDelete(Request $request){

    	$trash = Overtime::whereIn('id',$request->ids)
                        ->delete();

        if($trash){
            return response()->json([
                'status' => true,
                'message' => "Your Record has been Permanent Delete!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "Something went wrong please try later!",
            'getDataUrl' => route($this->folder.'getData'),
        ]);
    }
}