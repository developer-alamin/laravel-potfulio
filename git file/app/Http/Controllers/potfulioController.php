<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\potfulioModel;

class potfulioController extends Controller
{
    public function potfulio()
    {
    	return view('adminPotfulio');
    }

    public function getPotfulio(Request $req)
    {
    	$getPotfulio = json_encode(potfulioModel::all());
    	return $getPotfulio;
    }

    public function addPotfulio(Request $req)
    {
    	$name = $req->input('name');
    	$cat = $req->input('cat');
    	$tec = $req->input('tec');

    	$img = $req->file('img')->store('public');
    	$exploade = (explode('/',$img))[1];
        $http = $_SERVER['HTTP_HOST'];
        $addimg = "http://".$http."/storage/".$exploade;

       	 date_default_timezone_set("Asia/Dhaka");
   		 $date = date("Y-m-d h:i:sa");
    	
    	$addPotfulio = potfulioModel::insert([
    		'name'=>$name,
    		'category'=>$cat,
    		'technology'=>$tec,
    		'img'=>$addimg,
    		'date'=>$date
    	]);

    	if ($addPotfulio == true) {
    		return 1;
    	}else{
    		return 0;
    	}
    }

    public function potfulioUpShow(Request $req)
    {
    	$id = $req->input('id');
    	$updateShow = potfulioModel::where('id',$id)->get();

    	return $updateShow;
    }

    public function potfulioUpdate(Request $req)
    {
    	$Upid = $req->input('Upid');
    	$Upname = $req->input('Upname');
    	$Upcat = $req->input('Upcat');
    	$Uptec = $req->input('Uptec');
    	
    	 date_default_timezone_set("Asia/Dhaka");
   		 $date = date("Y-m-d h:i:sa");

    	if ($req->file('NewImg')) {
    		$img = $req->file('NewImg')->store('public');

    		$explode = (explode('/',$newImg))[1];
    		$http = $_SERVER['HTTP_HOST'];
    		$NewImg = "http://".$http."/storage/".$explode;

    		$update = potfulioModel::where('id',$id)->update([
    			'id'=>$Upid,
    			'name'=>$Upname,
    			'category'=>$Upcat,
    			'technology'=>$Uptec,
    			'img'=>$NewImg,
    			'date'=>$date
    		]);
    		return $update;
    	}elseif ($req->input('oldImg')) {
    		$oldImg = $req->input('oldImg');

    		$update = potfulioModel::where('id',$id)->update([
    			'id'=>$Upid,
    			'name'=>$Upname,
    			'category'=>$Upcat,
    			'technology'=>$Uptec,
    			'img'=>$oldImg,
    			'date'=>$date
    		]);
    		return $update;

    	}else{
    		return 0;
    	}
    

    }


    public function potfulioDelete(Request $req)
    {
    	$Deleteid = $req->input('id');
    	$deleteImg = $req->input('ImgPath');

    	$deleteexplode = explode('/',$deleteImg);
    	$deleteEnd = end($deleteexplode);

    	$deleteImg = storage::delete('public/'.$deleteEnd);
    	$potfulioDelete = potfulioModel::where('id',$Deleteid)->delete();

    	return $potfulioDelete;
    }


}
