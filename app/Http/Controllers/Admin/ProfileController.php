<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	private $module = "admin.profile.";

    public function index(){
    	$admin = Auth()->user();
    	return View($this->module.'profile',[
    		'user'=>$admin,
    		'form_url'=>route($this->module."update")
    	]);
    }

    public function update(Request $request){
        $userpassword = DB::table("admins")->where("id",auth()->id())->first()->password;

    	if(isset($request->password) && Hash::check($request->password, $userpassword)){

    		$password = Hash::make($request->password);
    		if(isset($request->new_password)){
    			$password = Hash::make($request->new_password);
    		}
    		$data = [
    			'username' => $request->username,
    			'email' => auth()->user()->email,
    			'password' => $password,
    		];
    		Admin::find(auth()->id())->update($data);
    		return Redirect()->back()
    						->with('bgcolor','bg-success')
    						->withErrors(['errors'=>"Profile update successfully."]);
    	}

    	return Redirect()->back()
    					->with('bgcolor','bg-danger')
    					->withErrors(['errors'=>"Please enter your Password or Password doesn't Match."]);
    }
}
