<?php

use App\{Attendance,Employee};
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                'date' => "2021-04-11",
                'time_in' => "08:00:00",
                'time_out' => "17:00:00",
                'num_hour' => 5,
                'employee_id' => Employee::first()->id,
            ],
        ];

        $count = 0;
        foreach ($datas as $key => $data) {
            Attendance::create($data);
            $count++;
        }
        $this->command->info('Inserted '.$count.' Attendances.');
    }
}
