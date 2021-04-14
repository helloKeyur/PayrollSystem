<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Deduction,Position};
use Response;

class DashboardController extends Controller
{
    private $folder = "admin.";

    public function dashboard()
    {
    	return View($this->folder."dashboard.dashboard",[
    		'deductions'=> Deduction::latest('id')->get(),
    		'total_deduction' => Deduction::sum('amount'),
    		'positions'=> Position::inRandomOrder()->get(),
    	]);
    }

}
