<?php

use App\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
    		[
    			'time_in' => "07:00:00",
    			'time_out' => "16:00:00",
    		],
    		[
    			'time_in' => "08:00:00",
    			'time_out' => "17:00:00",
    		],
    		[
    			'time_in' => "09:00:00",
    			'time_out' => "18:00:00",
    		],
    		[
    			'time_in' => "10:00:00",
    			'time_out' => "19:00:00",
    		],
    	];

    	$count = 0;
    	foreach ($datas as $key => $data) {
    		Schedule::create($data);
    		$count++;
    	}
    	$this->command->info('Inserted '.$count.' Schedules.');
    }
}
