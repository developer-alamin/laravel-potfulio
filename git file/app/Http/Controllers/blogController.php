<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\blogModel;

class blogController extends Controller
{
   public function blog()
   {
   		return view('adminBlog');
   }
   public function getBlog()
   {
      $getBlog = json_encode(blogModel::all());
      return $getBlog;
   }

   public function addBlog(Request $req)
   {
   		$name = $req->input('name');
   		$img = $req->file('img')->store('public');

   		$exploade = (explode('/',$img))[1];
        $http = $_SERVER['HTTP_HOST'];
        $addimg = "http://".$http."/storage/".$exploade;

        date_default_timezone_set("Asia/Dhaka");
   		 $date = date("Y-m-d h:i:sa");


   		 $addBlog = blogModel::insert([
   		 	'name'=>$name,
   		 	'img'=>$addimg,
   		 	'date'=>$date
   		 ]);
   		 if ($addBlog == true) {
   		 	return 1;
   		 }else{
   		 	return 0;
   		 }

   }


   public function BlogEditShow(Request $req)
   {
     $id = $req->input('id');

     $blogShowData = blogModel::where('id',$id)->get();
     return $blogShowData;
   }

   public function BlogUpdate(Request $req)
   {
         $id = $req->input('id');
        $name = $req->input('Name');

        date_default_timezone_set("Asia/Dhaka");
       $date = date("Y-m-d h:i:sa");

        if ($req->file('NewImg')) {

            $img = $req->file('NewImg')->store('public');
              $exploade = (explode('/',$img))[1];
              $http = $_SERVER['HTTP_HOST'];
              $NewImg = "http://".$http."/storage/".$exploade;

              $update = blogModel::where('id',$id)->update([
                'id'=>$id,
                'name'=>$name,
                'img'=>$NewImg,
                'date'=>$date
              ]);

              return $update;

        }elseif ($req->input('oldImg')) {
          $oldImg = $req->input('oldImg');
          $update = blogModel::where('id',$id)->update([
              'id'=>$id,
              'name'=>$name,
              'img'=>$oldImg,
              'date'=>$date
            ]);
           return $update;
        }else{
          return 0;
        }
   }

   public function BlogDelete(Request $req)
   {
      $id = $req->input('id');
      $img = $req->input('imgPath');

      $explode = explode('/',$img);
      $end = end($explode);

      $blogImgDelete = Storage::delete('public/'.$end);

      $blogDelete = blogModel::where('id',$id)->delete();
      if ($blogDelete == true) {
        return 1;
      }else{
        return 0;
      }
   }
}
