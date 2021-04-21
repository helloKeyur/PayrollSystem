<?php

use App\Deduction;
use Illuminate\Database\Seeder;

class DeductionSeeder extends Seeder
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
    			'name' => "Standard Deduction",
    			'amount' => 600.00,
    			'description' => "The Indian Finance Minister, while presenting the Union Budget 2018, announced a standard deduction amounting to Rs. 40,000 for salaried employees.",
    		],
    		[
    			'name' => "Medical Insurance Deduction",
    			'amount' => 200.00,
    			'description' => "Section 80C is the most extensively used option for saving income tax. ",
    		],
    	];

    	$count = 0;
    	foreach ($datas as $key => $data) {
    		Deduction::create($data);
    		$count++;
    	}
    	$this->command->info('Inserted '.$count.' Deductions.');
    }
}
