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
use Excel;
class salescodeController extends CallApiController {

		public function updatesalescode()
		{
		return view('sales-code-update');
	}

		public function selfcodefbaid($salsecode){
		$fbaid=DB::select("call get_self_salescode($salsecode)");
		return json_encode($fbaid);
}

public function insertsalescode(Request $req)
{
DB::statement('call sp_update_self_code(?,?)',array(
	$req->txtfbaid,              
	$req->sfbaid 
      
    ));


}

}
