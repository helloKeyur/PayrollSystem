<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionSeeder extends Seeder
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
    			'title' => "Graphic Designer",
    			'description' => "Graphic designers create visual concepts, using computer software or by hand, to communicate ideas that inspire, inform, and captivate consumers.",
    		],
    		[
    			'title' => "Marketing",
    			'description' => "Marketing refers to activities a company undertakes to promote the buying or selling of a product or service. Marketing includes advertising, selling, and delivering products to consumers or other businesses. Some marketing is done by affiliates on behalf of a company.",
    		],
    		[
    			'title' => "Programmer",
    			'description' => "Computer programmers write, test, debug, and maintain the detailed instructions, called computer programs, that computers must follow to perform their functions.",
    		],
    		[
    			'title' => "Writer",
    			'description' => "A writer is a person who uses written words in different styles and techniques to communicate ideas.",
    		],
    	];

    	$count = 0;
    	foreach ($datas as $key => $data) {
    		Position::create($data);
    		$count++;
    	}
    	$this->command->info('Inserted '.$count.' Positions.');
    }
}
