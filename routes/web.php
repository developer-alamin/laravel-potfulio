<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\adminController;
use App\Http\Controllers\visitorController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\resumeController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\potfulioController;
use App\Http\Controllers\socialController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\skillController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[SiteController::class,'home']);
Route::get('/cv',[SiteController::class,'cv']);

Route::get('/getHomeImg',[SiteController::class,'getHomeImg']);

Route::get('/about',[SiteController::class,'about']);
Route::get('/resume',[SiteController::class,'resume']);
Route::get('/potfulio',[SiteController::class,'potfulio']);
Route::get('/blog',[SiteController::class,'blog']);
Route::get('/contact',[SiteController::class,'contact']);
Route::post('/contectSend',[SiteController::class,'contectSend']);
Route::get('/login',[SiteController::class,'login']);
Route::post('/onlogin',[SiteController::class,'onlogin']);

Route::group(['prefix'=>'admin'],function()
{
	Route::get('/',[visitorController::class,'adminHome'])->middleware('login');
	//visitor page Route code start form here
	Route::get('/visitor',[visitorController::class,'visitor'])->middleware('login');
	Route::get('/getvisitor',[visitorController::class,'getvisitor'])->middleware('login');
	//visitor page Route code end form here

	//about page route code start form here
	Route::get('/about',[aboutController::class,'about'])->middleware('login');
	Route::get('/getabout',[aboutController::class,'getabout'])->middleware('login');
	Route::post('/aboutDataShow',[aboutController::class,'aboutDataShow'])->middleware('login');
	Route::post('/aboutUpdate',[aboutController::class,'aboutUpdate'])->middleware('login');
	Route::post('/addAbout',[aboutController::class,'addAbout'])->middleware('login');
	Route::post('/aboutDeleteShow',[aboutController::class,'aboutDeleteShow'])->middleware('login');
	Route::post('/aboutDelete',[aboutController::class,'aboutDelete'])->middleware('login');
	//about page route code end form here

	//resume page Route code start form here
	Route::get('/resume',[resumeController::class,'resume'])->middleware('login');
	Route::get('/getResume',[resumeController::class,'getResume'])->middleware('login');
	Route::post('/addResume',[resumeController::class,'addResume'])->middleware('login');
	
	Route::post('/resumeDataShow',[resumeController::class,'resumeDataShow'])->middleware('login');
	Route::post('/resumeUpdate',[resumeController::class,'resumeUpdate'])->middleware('login');
	
	Route::post('/resumeDelete',[resumeController::class,'resumeDelete'])->middleware('login');
	//resume page Route code end form here

	//blog page route code start form here
	Route::get('/blog',[blogController::class,'blog'])->middleware('login');
	Route::get('/getBlog',[blogController::class,'getBlog'])->middleware('login');
	Route::post('/AddBlog',[blogController::class,'AddBlog'])->middleware('login');
	Route::post('/BlogEditShow',[blogController::class,'BlogEditShow'])->middleware('login');
	Route::post('/BlogUpdate',[blogController::class,'BlogUpdate'])->middleware('login');
	Route::post('/BlogDelete',[blogController::class,'BlogDelete'])->middleware('login');
	
	//blog page route code end form here

	//potfulio page route code start form here
	Route::get('/potfulio',[potfulioController::class,'potfulio'])->middleware('login');
	Route::get('/getPotfulio',[potfulioController::class,'getPotfulio'])->middleware('login');
	Route::post('/addPotfulio',[potfulioController::class,'addPotfulio'])->middleware('login');
	Route::post('/potfulioUpShow',[potfulioController::class,'potfulioUpShow'])->middleware('login');
	Route::post('/potfulioUpdate',[potfulioController::class,'potfulioUpdate'])->middleware('login');
	Route::post('/potfulioDelete',[potfulioController::class,'potfulioDelete'])->middleware('login');
	
	
	//potfulio page route code end form here

	//contact page route code start form here
	Route::get('/contact',[contactController::class,'contact'])->middleware('login');
	Route::get('/getContact',[contactController::class,'getContact'])->middleware('login');
	Route::post('/deleteContact',[contactController::class,'deleteContact'])->middleware('login');
	
	
	//contact page route code end form here

	//profile page and logout page route code start form here
	Route::get('/profile',[adminController::class,'profile'])->middleware('login');
	Route::get('/getProfileImg',[adminController::class,'getProfileImg'])->middleware('login');


	Route::get('/getProfile',[adminController::class,'getProfile'])->middleware('login');
	
	Route::post('/UpdateProfile',[adminController::class,'UpdateProfile'])->middleware('login');
	
	Route::get('/logout',[adminController::class,'logout'])->middleware('login');
	//profile page and logout page route code end form here

	//social Route function code start form here
	Route::get('/social',[socialController::class,'socialData'])->middleware('login');
	Route::post('/addSocial',[socialController::class,'addSocial'])->middleware('login');
	Route::get('/getSocial',[socialController::class,'getSocial'])->middleware('login');
	Route::post('/socialDelete',[socialController::class,'socialDelete'])->middleware('login');
	Route::post('/socialDeltais',[socialController::class,'socialDeltais'])->middleware('login');
	Route::post('/socialUpdate',[socialController::class,'socialUpdate'])->middleware('login');
	Route::get('/delete',[socialController::class,'delete'])->middleware('login');
	//social Route function code end form here

	//work skill function code start form here
	Route::get('/skill',[skillController::class,'skill'])->middleware('login');
	Route::post('/addskill',[skillController::class,'addskill'])->middleware('login');
	
	Route::get('/getskill',[skillController::class,'getskill'])->middleware('login');
	Route::post('/skillUpdateShow',[skillController::class,'skillUpdateShow'])->middleware('login');
	Route::post('/skillUpdate',[skillController::class,'skillUpdate'])->middleware('login');
	Route::post('/skillDelete',[skillController::class,'skillDelete'])->middleware('login');
	
	//work skill function code end form here
	Route::get('/aaa',[SiteController::class,'truncateDelete']);
});

