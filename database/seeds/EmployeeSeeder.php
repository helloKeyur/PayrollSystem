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
            [
                'first_name' => "Amit",
                'last_name' => "Rana",
                'phone' => "9843-321-321",
                'email' => "amit@yopmail.com",
                'address' => "526 /, , Trapinex House, Sholapur Street, Chinch Bunder, Andhra Pradesh",
                'gender' => "Male",
                'position_id' => "2",
                'schedule_id' => "3",
                'rate_per_hour' => "80.00",
                'salary' => "24000.00",
                'birthdate' => "June 13, 1994",
                'is_active' => 1,
            ],
            [
                'first_name' => "Amita",
                'last_name' => "Patil",
                'phone' => "9842-221-344",
                'email' => "amita@yopmail.com",
                'address' => "53 , A-, Har Indl Estate, Dhanraj Mills Compound, Lower Parel, Andhra Pradesh",
                'gender' => "Female",
                'position_id' => "4",
                'schedule_id' => "4",
                'rate_per_hour' => "70.00",
                'salary' => "21000.00",
                'birthdate' => "July 03, 1995",
                'is_active' => 1,
            ],
            [
                'first_name' => "Jayesh",
                'last_name' => "Walter",
                'phone' => "9843-321-555",
                'email' => "jayesh@yopmail.com",
                'address' => "Shop No 5, Sukh Aangan, St Road, Opp Bus Depot, Nalasopara(w), Andhra Pradesh",
                'gender' => "Male",
                'position_id' => "2",
                'schedule_id' => "3",
                'rate_per_hour' => "110.00",
                'salary' => "28000.00",
                'birthdate' => "May 01, 1992",
                'is_active' => 1,
            ],
            [
                'first_name' => "Rony",
                'last_name' => "Dceuza",
                'phone' => "9833-321-521",
                'email' => "rony@yopmail.com",
                'address' => "4 , D-, Yogi Nagar, Eksar Rd, Borivli (w), Andhra Pradesh",
                'gender' => "Male",
                'position_id' => "1",
                'schedule_id' => "3",
                'rate_per_hour' => "90.00",
                'salary' => "26000.00",
                'birthdate' => "December 05, 1991",
                'is_active' => 1,
            ],
            [
                'first_name' => "Reema",
                'last_name' => "Patel",
                'phone' => "7803-321-095",
                'email' => "rema@yopmail.com",
                'address' => "146 -, Great Western , st, S Bhagat S Rd, Fort, Andhra Pradesh",
                'gender' => "Female",
                'position_id' => "4",
                'schedule_id' => "4",
                'rate_per_hour' => "90.00",
                'salary' => "26000.00",
                'birthdate' => "January 10, 1991",
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
