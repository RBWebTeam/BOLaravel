<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use Validator;
use Redirect;
use Session;
use URL;
use Mail;

class DashboardController extends InitialController
{
      public function dashboard()
      {
      	 $fbaid=Session::get('fbaid');
           $basicinfo=DB::select("call login_basic_info($fbaid)");   
      	      return view('dashboard.index',['basicinfo'=>$basicinfo]);
      }
}
