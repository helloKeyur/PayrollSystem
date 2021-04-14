<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
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
    			'first_name' => "Sameer",
    			'last_name' => "Patel",
    			'phone' => "9843-984-321",
    			'email' => "sameer@yopmail.com",
    			'address' => "4008  Grey Fox Farm Road, Houston, Hyderabad, Andhra Pradesh",
    			'gender' => "Male",
    			'position_id' => "3",
    			'schedule_id' => "2",
    			'rate_per_hour' => "100.00",
    			'salary' => "30000.00",
                'birthdate' => "April 10, 2001",
    			'is_active' => 1,
    		],
    		[
    			'first_name' => "Smita",
    			'last_name' => "Yadav",
    			'phone' => "9843-344-321",
    			'email' => "smita@yopmail.com",
    			'address' => "25 --/, nd Floor, Behind Ramakrishna Theatre, Abids, Hyderabad, Andhra Pradesh",
    			'gender' => "Female",
    			'position_id' => "2",
    			'schedule_id' => "3",
    			'rate_per_hour' => "80.00",
    			'salary' => "24000.00",
                'birthdate' => "May 23, 1998",
                'is_active' => 1,
    		],
    	];

    	$count = 0;
    	foreach ($datas as $key => $data) {
    		Employee::create($data);
    		$count++;
    	}
    	$this->command->info('Inserted '.$count.' Employees.');
    }
}
