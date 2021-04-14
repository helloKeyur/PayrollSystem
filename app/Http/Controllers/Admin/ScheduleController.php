<?php

namespace App\Http\Controllers\Admin;

use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{
    private $folder = "admin.schedule.";

    public function index()
    {
        $get_data = route($this->folder.'getData');
        return View($this->folder.'index',[
            'get_data' => $get_data,
        ]);
    }
    
    public function getData()
    {
        $schedules = Schedule::get();
        return View($this->folder.'content',[
            'schedules'=>$schedules,
            'add_new' => route($this->folder.'create'),
            'count' => Schedule::count(),
            'moveToTrashAllLink' => route($this->folder.'massDelete'),
        ]);
    }

    public function create()
    {
        return View($this->folder."create",[
            'form_store' => route($this->folder.'store'),
            ]);
    }

    public function store(ScheduleRequest $request)
    {
        $schedule = Schedule::create($request->all());

        return response()->json([
            'status'=>true,
            'message'=>'New Schedule created successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $schedule = Schedule::where('id',$id)->first();
    	return View($this->folder.'edit',[
    		'schedule' => $schedule,
    		'form_update' => route($this->folder.'update',['schedule'=>$schedule]),
    	]);
    }

    public function update(ScheduleRequest $request, $id)
    {
        $schedule = Schedule::where('id',$id)->first();
        $schedule->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Schedule updated successfully.',
            'redirect_to' => route($this->folder.'index')
            ]);
    }

    public function destroy($id)
    {
        $schedule = Schedule::where('id',$id)->first();
        $schedule->delete();
        return response()->json([
                'status' => true,
                'message' => "Your Record has been Deleted!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
    }

    public function massDelete(Request $request)
    {
        $schedules = Schedule::whereIn('id',$request->ids)
                        ->delete();

        return response()->json([
                'status' => true,
                'message' => "Your all Record has been Deleted!",
                'getDataUrl' => route($this->folder.'getData'),
            ]);
    }
}