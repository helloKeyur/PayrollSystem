<?php
 
namespace App\Observer;
 
use App\{Attendance,Employee};
 
class AttendanceObserver
{
    public function creating(Attendance $attendance)
    {
        $employee = Employee::where("id",$attendance->employee_id)->first();

        // calculate check_in time with schedule time
        $time_in = strtotime($attendance->time_in);
        $schedule_time_in = strtotime("+30 minutes",strtotime($employee->schedule->time_in)); // If there is employee check_in time is 30 min. interval then it will count in **OnTime** otherwise it will be count as **Late** check-in.

        // calculating ontime_status
        $ontime_status = ($time_in > $schedule_time_in) ? 0: 1;
        // set ontime_status
        $attendance->ontime_status = $ontime_status;

        $emp_schd_time_in = strtotime($employee->schedule->time_in);
        $emp_schd_time_out = strtotime($employee->schedule->time_out);
        $emp_working_hour = round(abs($emp_schd_time_out - $emp_schd_time_in) / 60,2);

        // calculate check_in time with schedule time
        $time_in = strtotime($attendance->time_in);
        $time_out = strtotime($attendance->time_out);
        $working_hour = round(abs($time_out - $time_in) / 60,2);

        // calculating ontime_status
        if($attendance->ontime_status == 1){ // ontime_checkin
            $curnt_working_hour = $emp_working_hour - $working_hour;
            if($working_hour > $emp_working_hour){
                $attendance->num_hour = $working_hour; //store minit in database
            }
            elseif($curnt_working_hour <= 1){ 
                $attendance->num_hour = $emp_working_hour; //store minit in database
            }else{
                $attendance->num_hour = $working_hour; //store minit in database
            }
        }else{
            $attendance->num_hour = $working_hour; //store minit in database
        }
    }

    public function updating(Attendance $attendance)
    {
        $employee = Employee::where("id",$attendance->employee_id)->first();

        // calculate check_in time with schedule time
        $time_in = strtotime($attendance->time_in);
        $schedule_time_in = strtotime("+30 minutes",strtotime($employee->schedule->time_in)); // If there is employee check_in time is 30 min. interval then it will count in **OnTime** otherwise it will be count as **Late** check-in.

        // calculating ontime_status
        $ontime_status = ($time_in > $schedule_time_in) ? 0: 1;
        // set ontime_status
        $attendance->ontime_status = $ontime_status;
        
        $emp_schd_time_in = strtotime($employee->schedule->time_in);
        $emp_schd_time_out = strtotime($employee->schedule->time_out);
        $emp_working_hour = round(abs($emp_schd_time_out - $emp_schd_time_in) / 60,2);

        // calculate check_in time with schedule time
        $time_in = strtotime($attendance->time_in);
        $time_out = strtotime($attendance->time_out);
        $working_hour = round(abs($time_out - $time_in) / 60,2);

        // calculating ontime_status
        if($attendance->ontime_status == 1){ // ontime_checkin
            $curnt_working_hour = $emp_working_hour - $working_hour;
            if($working_hour > $emp_working_hour){
                $attendance->num_hour = $working_hour; //store minit in database
            }
            elseif($curnt_working_hour <= 1){ 
                $attendance->num_hour = $emp_working_hour; //store minit in database
            }else{
                $attendance->num_hour = $working_hour; //store minit in database
            }
        }else{
            $attendance->num_hour = $working_hour; //store minit in database
        }
    }
}