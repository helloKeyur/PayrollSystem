<?php

namespace App\Http\Controllers\Admin;

use App\{Employee,Schedule,Position};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Mail\StaffCreated;
use DataTables;
use Mail;

class EmployeeController extends Controller
{
    private $folder = "admin.employee.";

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
            'employees' => Employee::get(),
        ]);
    }

    //not use now : 03-05-2021 @auther : kdvamja
    public function getDataTable(){
        $employees = Employee::get();
        return Datatables::of($employees)
                    ->addIndexColumn()
                    ->addColumn('avatar', function($data){
                        $avatar = "<img src='".$data->mediaUrl['thumb']."' class='table-user-thumb'>";
                        return $avatar;
                    })
                    ->addColumn('is_active', function($data){
                        if($data->is_active == '1'){
                            $status = "<span class='success-dot' title='Published' title='Active Employee'></span>";
                        }else{
                            $status = "<i class='ik ik-alert-circle text-danger alert-status' title='In-Active Employee'></i>";
                        }
                        return $status;
                    })
                    ->addColumn('details', function($data){
                        $details = "<div class=''>
                        		<b>Gender :</b> <span>".$data->gender."</span></br>
                                <b>Employee Id :</b> <span>".$data->employee_id."</span></br>
                        		<b>Schedule :</b> <span>".$data->schedule->time_in.'-'.$data->schedule->time_out."</span></br>
                        		<b>Address :</b> <span>".$data->address."</span></br>
                        		</div>";
                        return $details;
                    })
                    ->addColumn('position', function($data){
                        return $data->position->title;
                    })
                    ->addColumn('action', function($data){
                            $btn = "<div class='table-actions'>
                            <a data-href='".route($this->folder.'show',['employee_id'=>$data->employee_id])."' class='show-employee cursure-pointer'><i class='ik ik-eye text-primary'></i></a>
                            <a href='".route($this->folder."edit",['employee_id'=>$data->employee_id])."'><i class='ik ik-edit-2 text-dark'></i></a>
                            <a data-href='".route($this->folder."destroy",['id'=>$data->id])."' class='delete cursure-pointer'><i class='ik ik-trash-2 text-danger'></i></a>
                            </div>";
                            return $btn;
                    })
                    ->rawColumns(['action','avatar','is_active','position','details'])
                    ->toJson();
    }

    public function create()
    {   
        $schedules = Schedule::get();
        $positions = Position::get();
        return View($this->folder."create",[
            'form_store' => route($this->folder.'store'),
            'schedules' => $schedules,
            'positions' => $positions,
        ]);
    }
    
    public function store(EmployeeRequest $request)
    {   
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'schedule_id' => $request->schedule_id,
            'position_id' => $request->position_id,
            'address' => $request->address,
            'remark' => $request->remark,
            'rate_per_hour' => $request->rate_per_hour,
            'salary' => $request->salary,
            'is_active' => $request->is_active,
        ];
        $employee = Employee::create($data);
        //below here i am save the image which is given by user and save that id to our parent table as a foreign key
        if($request->has('media') && file_exists(storage_path('media/uploads/'.$request->input('media')))){
            $media = $employee->addMedia(storage_path('media/uploads/' . $request->input('media')))->toMediaCollection('avatar');
            $employee->media_id = $media->id;
            $employee->save(); // save media_id here
        }

        // Mail::to($employee->email)->send(new StaffCreated($data));
        return response()->json([
            'status'=>true,
            'message'=>'New Employee created successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function show(Employee $employee){   
        return View($this->folder.'show',[
            'employee'=>$employee,
        ]);
    }

    public function edit(Employee $employee)
    {
        $schedules = Schedule::get();
        $positions = Position::get();
        return View($this->folder.'edit',[
            'employee' => $employee,
            'form_update' => route($this->folder.'update',['employee'=>$employee]),
            'schedules' => $schedules,
            'positions' => $positions,
            'removeAvatar' => route('admin.removeMedia',[
                'model'=>'Employee',
                'model_id'=>$employee->id,
                'collection'=>'avatar']),
        ]);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'schedule_id' => $request->schedule_id,
            'position_id' => $request->position_id,
            'address' => $request->address,
            'remark' => $request->remark,
            'rate_per_hour' => $request->rate_per_hour,
            'salary' => $request->salary,
            'is_active' => $request->is_active,
        ];
        $employee->update($data);

        if($request->has('media') && file_exists(storage_path('media/uploads/'.$request->input('media')))){
            $media = $employee->addMedia(storage_path('media/uploads/' . $request->input('media')))->toMediaCollection('avatar');
            $employee->media_id = $media->id;
            $employee->save(); // save media_id here
        }

        return response()->json([
            'status'=>true,
            'message'=> $employee->employee_id.' updated successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    protected function permanentDelete($id){
        $trash = Employee::find($id);
        if (count($trash->getMedia('avatar')) > 0) {
            foreach ($trash->getMedia('avatar') as $media) {
                $media->delete();
            }
        }
        $trash->delete();
        return true;
    }

    protected function massPermanentDelete($ids){
        $employees = Employee::whereIn('id',$ids)
                        ->get();
        foreach ($employees as $employee) {
            $this->permanentDelete($employee->id);
        }
        return true;
    }

    public function destroy(Request $request,$id)
    {   
        $trash = $this->permanentDelete($id);
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
        //this is for permanent delete all record
        $trash = $this->massPermanentDelete($request->ids);

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