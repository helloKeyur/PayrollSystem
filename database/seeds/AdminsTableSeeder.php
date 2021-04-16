<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = Admin::create([
    		'username' => 'Keyur Vamja',
    		'email' => 'admin@gmail.com',
    		'image' => 'user.jpg',
    		'password' => Hash::make('123456'), 
    	]);
        $this->command->info('Inserted 1 Admin.');
    }
}
