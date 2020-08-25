<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function first(){

    	return view ('design.first');
    }

    public function dashboard(){
    	return view('organization.admin.dashboard.dashboard');
    }







}
