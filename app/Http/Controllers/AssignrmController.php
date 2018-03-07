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
class AssignrmController extends Controller
{
	public function loadrm()
	{

		return view('dashboard.Assignrm'); //,['state'=>$state,'manager'=>$manager]
	}
}

