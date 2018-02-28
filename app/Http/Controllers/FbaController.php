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
class FbaController extends CallApiController
{
      
        public function fba_list()
        {

         $query=DB::select("call usp_load_fbalist_new(0)");
         $doctype = DB::select("call get_document_type()");
        
         //print_r($doctype); exit();
          return view('dashboard.fba-list',['query'=>$query,'doctype'=>$doctype]);
        }

        public function updateposp($fbaid,$value,$flag) {
          DB::select("call usp_update_posploanid('$fbaid','$value','$flag')");
          return redirect('fba-list');
        }
        public function sendsms(Request $req) {

              $newsms = str_replace(' ', '%20', $req->sms);
              $post_data="";
              $result=$this->call_json_data_api('http://vas.mobilogi.com/api.php?username=rupeeboss&password=pass1234&route=1&sender=FINMRT&mobile[]='.$req->mobile_no.'&message[]='.$newsms,$post_data);
              $http_result=$result['http_result'];
              $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=$s=str_replace('\\', "", $s);
              $update_user='';
              $obj = json_decode($m);

        }

        public function sales(Request $req){
       
        $query=DB::table('fbamast')
            ->where('FBAID','=',$req->p_fbaid)
            ->update(['salescode' =>$req->p_remark]);
           if ( $query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
        }




}


