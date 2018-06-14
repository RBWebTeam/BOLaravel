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
class quickleaddashboardController extends Controller
{
	public function getquicklead()
	{
		$query = DB::select("call Get_all_Quick_lead()"); 

		return view('quickleaddashboard',['query'=>$query]);

	}

}