<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\cvModel;
use App\Models\socialModel;

class adminController extends Controller
{

    public function profile(){
    	
    	return view('adminProfile');
    }


    public function getProfileImg($value='')
    {
       $profileImg = json_encode(cvModel::all());
       return $profileImg;
    }

	 public function logout(Request $req)
      {
        $req->session()->flush();
        $cvData = cvModel::find(1);
        $social = socialModel::all();
        return view('home',[
          'cvhomeData'=>$cvData,
          'socialKey'=>$social
        ]);
      }

    public function getProfile(Request $req)
    {
        $id = 1;
    	$getProfile = DB::table('cv')->where('id',$id)->get();
    	return $getProfile;
    }

    public function UpdateProfile(Request $req)
    {

        $id = $req->input('id');
    	$name = $req->input('name');
    	$father = $req->input('father');
    	$mother = $req->input('mother');
    	$email = $req->input('email');
    	$mobile = $req->input('mobile');
    	$workPost = $req->input('workPost');
    	$birth = $req->input('birth');
        $post = $req->input('postoffice');
    	$facebook = $req->input('facebook');
    	$githab = $req->input('githab');
    	$linkedin = $req->input('linkedin');
    	$address = $req->input('address');
    	$map = $req->input('map');
    	$about = $req->input('about');

          date_default_timezone_set("Asia/Dhaka");
         $date = date("Y-m-d h:i:sa");

        if ($req->file('NewImg')) {
           $img = $req->file('NewImg')->store('public');
           $explode = (explode('/',$img))[1];
           $http = $_SERVER['HTTP_HOST'];
            $NewImg = "http://".$http."/storage/".$exploade;

            $update =  DB::table('cv')->where('id',$id)->update([
                'name'=>$name,
                'father'=>$father,
                'mother'=>$mother,
                'email'=>$email,
                'mobile'=>$mobile,
                'workPost'=>$workPost,
                'birth'=>$birth,
                'postOffice'=>$post,
                'facebook'=>$facebook,
                'github'=>$githab,
                'linkedin'=>$linkedin,
                'address'=>$address,
                'map'=>$map,
                'photo'=> $NewImg,
                'MyText'=>$about,
                'date'=>$date
            ]);

            return  $update;
        }elseif ($req->input('oldImg')) {
          $oldImg = $req->input('oldImg');

           $update =  DB::table('cv')->where('id',$id)->update([
                'name'=>$name,
                'father'=>$father,
                'mother'=>$mother,
                'email'=>$email,
                'mobile'=>$mobile,
                'workPost'=>$workPost,
                'birth'=>$birth,
                'postOffice'=>$post,
                'facebook'=>$facebook,
                'github'=>$githab,
                'linkedin'=>$linkedin,
                'address'=>$address,
                'map'=>$map,
                'photo'=> $oldImg,
                'MyText'=>$about,
                'date'=>$date
            ]);

            return  $update;

        }else{
            return 0;
        }

    }

}

