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
class OfflinecsDashboardController extends Controller
{
	public function getofflinecsdata()
	{
		//$data=DB::select("call Usp_get_offlinecs_data_view()");
		 //echo "Ssss";
		 return view('offlinecsDashboard');
	}
 
}

