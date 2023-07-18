<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Paginator;
use Illuminate\Pagination\Facades\DB;
use App\Models\visitorModel;
use App\Models\adminModel;
use App\Models\cvModel;
use App\Models\socialModel;
use App\Models\aboutModel;
use App\Models\resumeModel;
use App\Models\blogModel;
use App\Models\potfulioModel;
use App\Models\skillModel;

class SiteController extends Controller
{
   function home(Request $req){

    $visitor = $_SERVER["REMOTE_ADDR"];
    date_default_timezone_set("Asia/Dhaka");
    $date = date("Y-m-d h:i:sa");
    visitorModel::create([
      'visitor' => $visitor,
      'date' =>$date
     ]);

    $cvData = cvModel::find(1);
    $social = socialModel::all();
    return view('home',[
      'cvhomeData'=>$cvData,
      'socialKey'=>$social
    ]);
   
   }

   public function getHomeImg(Request $req)
   {
      $cvImg = json_encode(cvModel::all());
      return $cvImg;
   }

   function about(){
      $aboutCvData = cvModel::find(1);
      $about = aboutModel::all();
   		return view('about',[
        'aboutCvKey'=> $aboutCvData,
        'aboutKey'=>$about
      ]);
   }
   function resume(){
    $resume = resumeModel::all();
    $skill = skillModel::all();
   		return view('resume',[
        'resumeKey'=>$resume,
        'skillKey'=>$skill
      ]);
   }
   function potfulio(){

      $potfulio = potfulioModel::all();
   		return view('potfulio',['potfulioKey'=>$potfulio]);
   }
   function blog(){
    $blogKey = blogModel::inRandomOrder()->paginate(6);
   		return view('blog',compact('blogKey'));
   }
   function contact(){
    $social = socialModel::all();
   		return view('contact',[
        'socialKey'=>$social
      ]);
   }

   function contectSend(Request $req){
         $name = $req->input('name');
          $sub = $req->input('sub');
          $email = $req->input('email');
          $text = $req->input('text');

          $data = DB::table('contact')->insertOrIgnore(['name'=>$name,'email'=>$email,'sub'=>$sub,'text'=>$text]);
          if ($data == true) {
           return 1;
          }else{
            return 0;
          }
        
    }


      public function login()
      {
          return view('login');
      }

      public function onlogin(Request $req){

          $user = $req->input('user');
           $pass = $req->input('pass');

          $data = adminModel::where('Username',$user)->where('password',$pass)->count();
          if ($data == 1) {
          $req->session()->put('userKey',$user);
           return 1;
          } else {
            return 0;
          }
          
      }


      public function truncateDelete(Request $req)
      {
          $truncate = blogModel::truncate();
          return $truncate;
      }


      public function cv($value='')
      {
        return view('cv');
      }

      
    
}
