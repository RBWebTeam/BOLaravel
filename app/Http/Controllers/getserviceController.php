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
   class getserviceController extends CallApiController {

   			public function getviewservice(Request $req){
			return view('get_service',['fbaid'=>$req->fbaid]);
 }



               public function sendcommissionmail(Request $req)   {
		        try{
                    $data='{"fbaid": "'.$req->fbaid.'"}';
                    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
                  	$type=$token;
                    $result=$this->call_other_data_api($this::$api_url.'/api/send-commission',$data,$type);
                    $Response= json_decode($result['http_result']);     
                    return json_encode($Response);    
                 }
             catch (Exception $e)
             {
                return $e->getMessage();   
             }   
        }

}
