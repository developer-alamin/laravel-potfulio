<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\socialModel;

class socialController extends Controller
{
   public function socialData()
   {
   		return view('adminSocial');
   }
   public function getSocial()
   {
   		$socialGetData = json_encode(socialModel::all());
   		
   		return $socialGetData; 
   }

   public function addSocial(Request $req)
   {
   		$name = $req->input('name');
   		$link = $req->input('link');
   		date_default_timezone_set("Asia/Dhaka");
   		 $date = date("Y-m-d h:i:sa");
   		$socialResult = socialModel::insert([
   			'name'=>$name,
   			'icon'=>$link,
   			'date'=>$date
   		]);
   		if ($socialResult == true) {
   			return 1;
   		} else {
   			return 0;
   		}
   		
   }


   public function socialDelete(Request $req)
   {
   		$id = $req->input('id');
   		$socialdelete = socialModel::where('id',$id)->delete();
   		if ($socialdelete == true) {
   			return 1;
   		} else {
   			require 0;
   		}
   		
   }

   public function socialDeltais(Request $req)
   {
      $id = $req->input('id');

      $details = socialModel::where('id',$id)->get();
      return $details;
   }

   public function socialUpdate(Request $req)
   {
         date_default_timezone_set("Asia/Dhaka");
          $date = date("Y-m-d h:i:sa");
         $id = $req->input('id');
         $name = $req->input('name');
         $icon = $req->input('link');

         $update = socialModel::where('id',$id)->update([
            'name'=> $name,
            'icon'=>$icon,
            'date'=>$date
         ]);
         return $update;

   }


   public function delete()
   {
      socialModel::truncate();
   }

}
