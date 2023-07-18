<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aboutModel;
use Illuminate\Support\Facades\Storage;
class aboutController extends Controller
{
    public function about()
    {
    	return view('adminAbout');
    }

    public function getabout(Request $req)
    {
    	$aboutData = json_encode(aboutModel::all());
    	return $aboutData;
    }

    public function aboutDataShow(Request $req)
    {
    	$id = $req->input('id');

    	$aboutDeteils = aboutModel::where('id',$id)->get();
    	return $aboutDeteils;
    }

    public function aboutUpdate(Request $req)
    {
    	$id = $req->input('id');
		$name = $req->input('name');
		$title = $req->input('title');

		if ($req->file('NewImg')) {

			$oldImg = $req->input('oldImg');
			$imgAray = explode("/",$oldImg);
	        $oldImg = end($imgAray);
	        storage::delete('public/'.$oldImg);

		    $img = $req->file('NewImg')->store('public');
	        $exploade = (explode('/',$img))[1];
	        $http = $_SERVER['HTTP_HOST'];
	        $NewImg = "http://".$http."/storage/".$exploade;

	        $update = aboutModel::where('id',$id)->update([
		        'id'=>$id,
		        'name'=>$name,
		        'nameTitle'=>$title,
		        'img'=>$NewImg
	        ]);

	        return $update;

		}elseif ($req->input('oldImg')) {
			$oldImg = $req->input('oldImg');
			$update = aboutModel::where('id',$id)->update([
		        'id'=>$id,
		        'name'=>$name,
		        'nameTitle'=>$title,
		        'img'=>$oldImg
	        ]);
	       return $update;
		}else{
			return 0;
		}


    }


    public function addAbout(Request $req)
    {
    	$name = $req->input('name');
    	$title = $req->input('title');

    	$img = $req->file('img')->store('public');
    	 $exploade = (explode('/',$img))[1];
        $http = $_SERVER['HTTP_HOST'];
        $addimg = "http://".$http."/storage/".$exploade;

         date_default_timezone_set("Asia/Dhaka");
   		 $date = date("Y-m-d h:i:sa");

        $add = aboutModel::insert([
        	'name'=> $name,
        	'nameTitle'=> $title,
        	'img'=> $addimg,
        	'date'=> $date
        ]);
        if ($add == true) {
        	return 1;
        }else{
        	return 0;
        }
    }

    public function aboutDeleteShow(Request $req)
    {
        $id = $req->input('id');
        $deleteDataShow = aboutModel::where('id',$id)->get();
         return $deleteDataShow;
    }

    public function aboutDelete(Request $req)
    {
        $id = $req->input('id');
        $img = $req->input('imgPath');

        $explode = explode('/',$img);
        $Imgend = end($explode);

       $aboutDeleteIng = storage::delete('public/'.$Imgend);
       $aboutDelete = aboutModel::where('id',$id)->delete();
       if ($aboutDelete == true) {
          return $aboutDelete;
       }else{
            return 0;
       }
    }
}
