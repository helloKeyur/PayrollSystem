<?php

use App\Overtime;
use Illuminate\Database\Seeder;

class OvertimeSeeder extends Seeder
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
    			'title' => "First Overtime for last check",
    			'rate_amount' => 280.00,
    			'hour' => '60',
    			'employee_id' => App\Employee::first()->id,
    			'date' => "2021-04-01",
    			'description' => "On this day we are schedule first overtime for employees.",
    		],
            [
                'title' => "First Overtime for last check",
                'rate_amount' => 300.00,
                'hour' => '60',
                'employee_id' => App\Employee::where("id",2)->first()->id,
                'date' => "2021-04-06",
                'description' => "On this day we are schedule first overtime for employees.",
            ],
            [
                'title' => "First Overtime for last check",
                'rate_amount' => 480.00,
                'hour' => '60',
                'employee_id' => App\Employee::where("id",3)->first()->id,
                'date' => "2021-04-10",
                'description' => "On this day we are schedule first overtime for employees.",
            ],
            [
                'title' => "First Overtime for last check",
                'rate_amount' => 580.00,
                'hour' => '60',
                'employee_id' => App\Employee::where("id",4)->first()->id,
                'date' => "2021-04-14",
                'description' => "On this day we are schedule first overtime for employees.",
            ],
    	];

    	$count = 0;
    	foreach ($datas as $key => $data) {
    		Overtime::create($data);
    		$count++;
    	}
    	$this->command->info('Inserted '.$count.' Overtimes.');
    }
}
