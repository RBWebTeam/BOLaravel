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
class FbaprofileController extends Controller
{
	public function fbaprofileview()
	{
		$Genins=DB::select("call Usp_load_Generalins()");
		$lifeins=DB::select("call Usp_load_lifeinsurence()");
		$healthins=DB::select("call Usp_load_healthins()");
	     return view('FbaProfile',['Genins'=>$Genins,'lifeins'=>$lifeins,'healthins'=>$healthins]);
	}
	
	public function Insertfbaprofile($require 'file';)
	{
		DB:: select("call Usp_insert_fbaprofile()");
	}
}