<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Response;
use DB;
use Hash;

class HelperController extends Controller
{
    private $folder = "admin.";

    /*
    * $request parameter has file 
    * return file name and original file  
    * Note : It just store file as temporary in uploads folder 
    */
    public function storeMedia(Request $request)
    {
    	$path = storage_path('media/uploads');

    	if (!file_exists($path)) {
    		mkdir($path, 0777, true);
    	}

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());

    	$file->move($path, $name);

    	return response()->json([
    		'name'          => $name,
    		'original_name' => $file->getClientOriginalName(),
    	]);
    }

    public function storeMediaBase64(Request $request){
        $path = storage_path('media/uploads/');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $data = $request->file;
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $file = base64_decode($data);
        $name = uniqid(). '.png';

        file_put_contents($path.$name, $file);

        return response()->json([
            'name'          => $name,
            'original_name' => $name,
            'profileUrl' => route('admin.showMediaFromTempFolder',['name'=>$name]),
            'removeProfileUrl' => route('admin.removeMediaFromTempFolder',['name'=>$name]),
        ]);
    }

    /*
    * $name filename of image
    */
    public function removeMediaFromTempFolder($name){
        if(file_exists(storage_path('media/uploads/'.$name))){
            unlink(storage_path('media/uploads/'.$name));
            return response()->json([
                'status' => true,
                'msg' => "Image are removed from our directory." 
            ]);
        }else{
            return response()->json([
                'status' => true,
                'msg' => "Image are not's exist in our directory." 
            ]);
        }
        return response()->json([
                'status' => false,
                'msg' => "Something went's wrong please try again!" 
            ]);
    }

    public function showMediaFromTempFolder($filename){
        $path = storage_path('media/uploads/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function removeMedia($model,$model_id,$collection=null){
        $modelName = "App\\$model";
        $model = $modelName::find($model_id);
        $model->update(['media_id'=>null]);
        foreach ($model->getMedia($collection) as $media) { // bcoz getMedia has array we handle it using loop
                    $media->delete();// delete old media
        }
    }

    public function confirmPassword(Request $request){
        $adminpassword = DB::table("admins")->find(Auth()->id())->password;
        if(isset($request->password) && Hash::check($request->password, $adminpassword)){
            return response()->json(['status'=>true]);
        }
        return response()->json(['status'=>false]);
    }

}
