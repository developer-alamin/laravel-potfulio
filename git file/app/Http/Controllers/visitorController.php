<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitorModel;
use App\Models\resumeModel;
use App\Models\blogModel;
use App\Models\potfulioModel;
use App\Models\cotactModel;
use App\Models\adminModel;
use App\Models\socialModel;
use App\Models\skillModel;


class visitorController extends Controller
{
   	public function adminHome()
   	{
         $visitor = visitorModel::count();
         $resume = resumeModel::count();
         $blog = blogModel::count();
         $potfulio = potfulioModel::count();
         $contact = cotactModel::count();
         $cv = adminModel::count();
         $social = socialModel::count();
         $skill = skillModel::count();
   		return view('adminHome',[
            'visitor'=>$visitor,
            'resume'=>$resume,
            'blog'=>$blog,
            'potfulio'=>$potfulio,
            'contact'=> $contact,
            'cv'=>$cv,
            'social'=>$social,
            'skill'=>$skill
         ]);
   	}

   	public function visitor()
   	{
   		return view('adminVisitor');
   	}

   	public function getvisitor(Request $req)
   	{
   		$visitData = json_encode(visitorModel::all());
   		return $visitData;
   	}


}
