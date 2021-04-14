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
    			'rate_amount' => 100.00,
    			'employee_id' => App\Employee::first()->id,
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
