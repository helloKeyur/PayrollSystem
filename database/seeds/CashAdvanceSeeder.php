<?php

use App\CashAdvance;
use Illuminate\Database\Seeder;

class CashAdvanceSeeder extends Seeder
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
    			'title' => "First Cash Advance for employee",
    			'rate_amount' => 1000.00,
    			'employee_id' => App\Employee::first()->id,
    			'date' => "2021-04-01",
    		],
            [
                'title' => "First Cash Advance for employee",
                'rate_amount' => 1500.00,
                'employee_id' => App\Employee::where("id",2)->first()->id,
                'date' => "2021-04-01",
            ],
            [
                'title' => "First Cash Advance for employee",
                'rate_amount' => 4000.00,
                'employee_id' => App\Employee::where("id",3)->first()->id,
                'date' => "2021-04-01",
            ],
    	];

    	$count = 0;
    	foreach ($datas as $key => $data) {
    		CashAdvance::create($data);
    		$count++;
    	}
    	$this->command->info('Inserted '.$count.' Cash-Advances.');
    }
}
