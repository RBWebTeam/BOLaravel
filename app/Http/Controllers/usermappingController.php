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
class usermappingController extends CallApiController {



		public function fbauser(){
		$id=Session::get('fbauserid');

  		$usermaping = DB::select("call usp_load_user_fba_mapping($id)");
		return view('user_mapping',['usermaping'=>$usermaping]);
     	
}

}


          