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
class imagetestController extends CallApiController{

		 public function imageview(){
	     $state = DB::select("call usp_load_state_list()");
		return view ('imagetest',['state'=>$state]);
	}


	public function geticity($id)
{
        $cities = DB::table("city_master")
                    ->where("stateid",$id)
                      ->orderBy('cityname', 'asc')
                      ->pluck("cityname","cityname")
                    ;
        return json_encode($cities);
       }

}
