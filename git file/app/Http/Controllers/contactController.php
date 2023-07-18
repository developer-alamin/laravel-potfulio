<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cotactModel;

class contactController extends Controller
{
   public function contact()
   {
   		return view('adminContact');
   }


   public function getContact()
   	{
   		$contatData = json_encode(cotactModel::all());
   		return $contatData;
   	}


   	public function deleteContact(Request $req)
   	{
   		$deleteId = $req->input('id');
   		$deleteData = cotactModel::where('id',$deleteId)->delete();
   		if ($deleteData == true) {
   			return 1;
   		} else {
   			return 0;
   		}
   		
   	}



   
}
