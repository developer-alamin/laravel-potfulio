<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skillModel;

class skillController extends Controller
{
   public function skill($value='')
   {
   		return view('adminskill');
   }
   public function addskill(Request $req)
   {
   		$name = $req->input('name');
   		$num = $req->input('num');

   		date_default_timezone_set("Asia/Dhaka");
   		 $date = date("Y-m-d h:i:sa");

   		 $addskill = skillModel::insert([
   		 	'name'=>$name,
   		 	'point'=>$num,
   		 	'date'=>$date
   		 ]);
   		 return $addskill;
   }


   public function getskill(Request $req)
   {
   		$getskill = json_encode(skillModel::all());
   		return $getskill;
   }

   public function skillUpdateShow(Request $req)
   {
   		$id = $req->input('showid');
   		$updateShow = skillModel::where('id',$id)->get();
   		return $updateShow;
   }

   public function skillUpdate(Request $req)
   {
   		$id = $req->input('Upid');
   		$Upname = $req->input('UpName');
   		$Upnum = $req->input('UpPoint');

   		date_default_timezone_set("Asia/Dhaka");
   		$date = date("Y-m-d h:i:sa");

   		$skillUpdate = skillModel::where('id',$id)->update([
   			'name'=>$Upname,
   			'point'=>$Upnum,
   			'date'=>$date
   		]);

   		return $skillUpdate;
   }


   public function skillDelete(Request $req)
   {
   		$id = $req->input('id');

   		$skillDelete = skillModel::where('id',$id)->delete();
   		return $skillDelete;
   }


}
