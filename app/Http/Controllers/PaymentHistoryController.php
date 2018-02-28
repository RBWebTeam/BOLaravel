<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentHistoryController extends CallApiController
{
     

      public function payment_history(Request $req){
                
                if(isset($req->fdate) && isset($req->todate)){
	      	     $data=array("FromDate"=>$req->fdate,"ToDate"=>$req->todate);

	      	      
	      	 }else{
                 $data=array("FromDate"=>Date('m-d-Y', strtotime("-7 days")),"ToDate"=>Date('m-d-Y'));
                 //$data=array("FromDate"=>"01-02-2018","ToDate"=>"01-28-2018");
	      	 }


//print_r(  $data);exit;
 


	      	    $post_data=json_encode($data);
	      	    $result=$this->call_json_data_api('http://mswebapi.magicsales.in/api/CommonAPI/GETPaymTrackDeta',$post_data);
	            $http_result=$result['http_result'];
	            $error=$result['error'];
	            $st=str_replace('"{', "{", $http_result);
	            $s=str_replace('}"', "}", $st);
	            $m=$s=str_replace('\\', "", $s);
	            $update_user='';
	            $obj = json_decode($m);

 
	          //  print_r($http_result);exit;

                   // if($obj->message->Status='1'){

                    	 $respon=($obj->message->lstPaymTrackDeta);
                    // }else{
                    // 	 $respon=0;
                    // }



                 
      	  return view('dashboard/payment-history',['respon'=>$respon]);
      }
}
