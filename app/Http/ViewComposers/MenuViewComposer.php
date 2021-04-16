<?php
namespace App\Http\ViewComposers;

use App\{Position,Admin,Deduction,Schedule,Employee,Attendance};
use Illuminate\Contracts\View\View;

class MenuViewComposer {

    public function compose(View $view) {
    	$total_attendance = Attendance::count();
    	$ontime_attendance = Attendance::where("ontime_status",1)->count();
    	$percentage =  $total_attendance == 0 ? 0 : number_format(($ontime_attendance/$total_attendance)*100,2);
        $view->with('counts', [
                'admins' => Admin::count() - 1,
                'positions' => Position::count(),
                'deductions' => Deduction::count(),
                'schedules' => Schedule::count(),
                'employees' => Employee::count(),
                'on_time_perc' => $percentage,
                'on_time_attendance' => Attendance::where(["date"=>date("Y-m-d",time()),"ontime_status"=>1])->count(),
                'late_attendance' => Attendance::where(["date"=>date("Y-m-d",time()),"ontime_status"=>0])->count(),
          ]);
    }
}

?>