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
class generatepaylinkController extends CallApiController {

      
   // public function paylinkgenerate (){

   // return view('dashboard.generatepaymentlink');

   //      }

 public function paylinkgenerate (){

        $plink=DB::select("call usp_load_not_paylink_list()");

        return view('dashboard.generatepaymentlink',['plink'=>$plink]);

        	}

         public function getnewpaylink ($fbaid){
         	   // print_r($fbaid);exit();
         try{
		
         $data='{"FBAID": "'.$fbaid.'"}';
        $type= array("cache-control: no-cache","content-type: application/json", "token:1234567890");
 
     $result=$this->call_other_data_api($this::$api_url.'/api/get-posp-payment-link',$data,$type);
 
       $http_result=$result['http_result'];
       $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=str_replace('\\', "", $s);
              $update_user='';
             print_r($m);exit();
              $custrespon = json_decode($m);
       }

  catch (Exception $e){

        return $e->getMessage();    
     }        
           return ($custrespon);  

    }

    public function sendpaysms(Request $req)
    {
    	      $text="Your payment link is genrated";
              $newsms = urlencode( $text.":".$req->txtlink);//htmlspecialchars();
                 //print_r($newsms); exit();
              
              $post_data="";
              $result=$this->call_json_data_api('http://vas.mobilogi.com/api.php?username=rupeeboss&password=pass1234&route=1&sender=FINMRT&mobile[]='.$req->txtmono.'&message[]='.$newsms,$post_data);
              $http_result=$result['http_result'];
              $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=$s=str_replace('\\', "", $s);
             
              $obj = json_decode($m);
              return $obj;
    }

}