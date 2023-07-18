<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resumeModel;

class resumeController extends Controller
{
    public function resume()
    {
    	return view('adminResume');
    }

    public function getResume()
    {
    	$resumeData = json_encode(resumeModel::all());
    	return $resumeData;
    }
    public function addResume(Request $req)
    {

    	$year = $req->input('year');
    	$examName = $req->input('examName');
    	$Institute = $req->input('Institute');
    	$resultYear = $req->input('resultYear');
    	$examTitle = $req->input('examTitle');
    	$result = $req->input('result');
    	
    	
    	date_default_timezone_set("Asia/Dhaka");
   		 $date = date("Y-m-d h:i:sa");

   		 $addResume = resumeModel::insert([
   		 	'year'=>$year,
   		 	'examName'=>$examName,
   		 	'instituteName'=>$Institute,
   		 	'resultYear'=>$resultYear,
   		 	'examTitle'=>$examTitle,
   		 	'result'=>$result,
   		 	'date'=>$date
   		 ]);
   		 if ($addResume == true) {
   		 	return 1;
   		 }else{
   		 	return 0;
   		 }
    	
    }
    public function resumeDataShow(Request $req)
    {
    	$id = $req->input('id');
    	$dataShow = resumeModel::where('id',$id)->get();
    	return $dataShow;
    }
    public function resumeUpdate(Request $req)
    {
    	$id = $req->input('id');
    	$yr = $req->input('yr');
    	$en = $req->input('en');
    	$i = $req->input('i');
    	$ry = $req->input('ry');
    	$et = $req->input('et');
    	$r = $req->input('r');

    	date_default_timezone_set("Asia/Dhaka");
   		 $date = date("Y-m-d h:i:sa");

   		$resumeUpdate = resumeModel::where('id',$id)->update([
			'year'=>$yr,
		 	'examName'=>$en,
		 	'instituteName'=>$i,
		 	'resultYear'=>$ry,
		 	'examTitle'=>$et,
		 	'result'=>$r,
		 	'date'=>$date
   		]); 
   		if ($resumeUpdate == true) {
   			return 1;
   		}else{
   			return 0;
   		}
    }

    public function resumeDelete(Request $req)
    {
    	$id = $req->input('id');
    	$resumeDelete = resumeModel::where('id',$id)->delete();
    	if ($resumeDelete == true) {
    		return 1;
    	}else{
    		return 0;
    	}
    }

}
