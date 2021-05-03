<?php

namespace App\Http\Controllers\Admin;

use App\{Employee,Attendance};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use DataTables;;

class AttendanceController extends Controller
{
    private $folder = "admin.attendance.";

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
        $attendance = Attendance::latest();
        return Datatables::of($attendance)
                    ->addIndexColumn()
                    ->addColumn('employee', function($data){
                    	return "<div class='row'><div class='col-md-3 text-center'><img src='".$data->employee->media_url['thumb']."' class='rounded-circle table-user-thumb'></div><div class='col-md-6 col-lg-6 my-auto'><b class='mb-0'>".$data->employee->first_name." ".$data->employee->last_name."</b><p class='mb-2' title='".$data->employee->employee_id."'><small><i class='ik ik-at-sign'></i>".$data->employee->employee_id."</small></p></div><div class='col-md-4 col-lg-4'><small class='text-muted float-right'></small></div></div>";
                    })
                    ->addColumn('action', function($data){
                            $btn = "<div class='table-actions'>
                            <a href='".route($this->folder."edit",['id'=>$data->id])."'><i class='ik ik-edit-2 text-dark'></i></a>
                            <a data-href='".route($this->folder."destroy",['id'=>$data->id])."' class='delete cursure-pointer'><i class='ik ik-trash-2 text-danger'></i></a>
                            </div>";
                            return $btn;
                    })
                    ->addColumn('time_in_details', function($data){
                            $status = "<div>";
                            $status .= "<span class='float-left'>";
                            $status.= $data->time_in;
                            $status .= "</span>";
                            $status .= "<span class='float-right'>";
                            if(!$data->ontime_status){
                            $status.= "<span class='text-danger'>LATE</span>";
                            }else{
                            $status.= "<span class='text-primary'>ONTIME</span>";
                            }
                            $status .= "</span>";
                            return $status;
                    })
                    ->addColumn('work_hr', function($data){
                            return $data->num_hour."/hr";
                    })
                    ->rawColumns(['employee','action','time_in_details','work_hr'])
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
    
    public function store(AttendanceRequest $request)
    {   
        $data = [
            'date' => $request->date,
            'employee_id' => $request->employee_id,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
            'num_hour' => 0,
        ];
        $attendance = Attendance::create($data);

        return response()->json([
            'status'=>true,
            'message'=>'New Attendance added successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function show(Attendance $attendance){   
        abort(404);
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::get();
        return View($this->folder.'edit',[
            'attendance' => $attendance,
            'form_update' => route($this->folder.'update',['attendance'=>$attendance]),
            'employees' => $employees,
        ]);
    }

    public function update(AttendanceRequest $request, Attendance $attendance)
    {
        $data = [
            'date' => $request->date,
            'employee_id' => $request->employee_id,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out
        ];
        $attendance->update($data);

        return response()->json([
            'status'=>true,
            'message'=> 'Attendance updated successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function destroy(Request $request,$id)
    {   
        $trash = Attendance::where('id',$id)->delete();
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

    	$trash = Attendance::whereIn('id',$request->ids)
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
