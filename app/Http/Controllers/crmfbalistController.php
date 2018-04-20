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
class crmfbalistController extends CallApiController
{

	public function crmlist(Request $req){
  $crmlist=DB::select("call usp_load_crm_fba_bycities(12773)");
   return view('crm_fba_list',['crmlist'=>$crmlist]);




	
	}



}
   