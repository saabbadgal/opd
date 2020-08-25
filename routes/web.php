<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
  Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!|
*/


//Route::view('/', 'welcome',['name' =>'OPD New Project']);


Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('patient.logout');
Route::domain('{account}.bnopd.com')->group(function (){
 
	Route::group(['middleware'=>'subdomain', 'namespace'=>'Organization'], function(){

        Route::get('/','FrontendController@hospital')->name('org.landing.page');
		Route::get('doctor-profile/{id}','FrontendController@doctor_profile')->name('doctor.profile');
		Route::get('appointment/{opd_id}','AppointmentController@booking_form')->name('appointment');
		Route::post('appointment-book','AppointmentController@book')->name('appointment.book');

		Route::get('admin/login','Auth\LoginController@showLoginForm')->name('org.admin.login');
		Route::post('admin/login','Auth\LoginController@login')->name('org.admin.login.check');
	
	Route::group(['middleware'=>'org','namespace'=>'Admin'], function(){
        
	            
        Route::any('/opds/{id?}',[ 'as'=>'opd', 'uses'=>'OpdController@list']);
        Route::post('opd/save',['as'=>'opd.save', 'uses'=>'OpdController@save']);
        Route::post('opd-update',['as'=>'opd.update', 'uses'=>'OpdController@update']);
        Route::get('/opd/delete/{id}',['uses'=>'OpdController@delete'])->name('org.opd.delete');
        Route::get('/opd-edit/{id}',['uses'=>'OpdController@edit'])->name('opd.edit');

		 

	});
Route::get('check','AppointmentController@check')->middleware('org')->name('check');
	 
});
});

Route::domain('bnopd.com')->group(function(){

	Route::get('/', 'SearchController@first')->name('first');
	Route::match(['get','post'],'search','SearchController@index')->name('search');
	// Route::get('get_city_data/{id}','SearchController@get_city_data')->name('get_city_data');
	// Route::get('get_result/{city}/{search?}','SearchController@get_result')->name('get_result');
	// Route::get('doctor-profile/{id?}','Dr\DrController@profile')->name('dr.profile');
	// Route::get('get_opd_schedule/{org_id}/{user_id}','SearchController@get_opd_schedule')->name('get_opd_schedule');
	Route::get('home','DesignController@first')->name('home');
	Route::get('dashboard','DesignController@dashboard')->name('dashboard');
});