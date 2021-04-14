<?php

namespace App\Http\Controllers\Admin;

use App\{Employee,Attendance};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckInRequest;


class CheckInController extends Controller
{
	public function checkin(){
		return View("admin.checkin",[
			'form_url' => route('admin.checkin.store'),
		]);
	}

	public function store(CheckInRequest $request){
		$emp_id = Employee::where('employee_id',$request->employee_id)->first()->id;
		$data = [
			'num_hour' => 0,
			'date' => date("Y-m-d",time()),
			'employee_id' => $emp_id,
			'time_in' => date("H:i:s",time()),
		];
        $attendance = Attendance::create($data);

        return response()->json([
        	'status'=>true,
        	'message'=>'New Attendance added successfully.',
			'redirect_to' => route('admin.checkin.index')
        ]);
	}

	public function update(CheckInRequest $request){
		$emp_id = Employee::where('employee_id',$request->employee_id)->first()->id;
		$attendance = Attendance::where([
									'employee_id' => $emp_id,
									'date' => date("Y-m-d",time())
								])->first();
		$data = [
			'date' => $request->date,
			'employee_id' => $emp_id,
			'time_out' => date("H:i:s",time())
		];
		$attendance->update($data);

		return response()->json([
			'status'=>true,
			'message'=> 'Attendance Added successfully.',
			'redirect_to' => route('admin.checkin.index')
		]);
	}
}
