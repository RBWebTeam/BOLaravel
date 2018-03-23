<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PaymentHistoryController extends CallApiController
{
     

      public function payment_history(Request $req){
      	   // try{
                
                if(isset($req->fdate) && isset($req->todate)){
	      	     $data=array($req->fdate,$req->todate);
	      	 }else{
                 $data=array(Date('d-m-Y', strtotime("-28 days")),Date('d-m-Y'));
                 //$data=array("FromDate"=>"01-02-2018","ToDate"=>"01-28-2018");
	      	 }


                           //print_r(  $data);exit;
                           //sp_payment_history_list()
	      	      $respon=DB::select('call sp_payment_history_list(?,?)',$data);

                  

	//       	    exit;

	//       	    $post_data=json_encode($data);
	//       	    $result=$this->call_json_data_api('http://mswebapi.magicsales.in/api/CommonAPI/GETPaymTrackDeta',$post_data);
	//             $http_result=$result['http_result'];
	//             $error=$result['error'];
	//             $st=str_replace('"{', "{", $http_result);
	//             $s=str_replace('}"', "}", $st);
	//             $m=$s=str_replace('\\', "", $s);
	//             $update_user='';
	//             $obj = json_decode($m);

 

 //                   if($obj->message->Status='1'){

 //                    	 $respon=($obj->message->lstPaymTrackDeta);
 //                    }else{
 //                     	 $respon=0;
 //                    }
	// }catch (Exception $e){

	//   return $e;    
 //     }


      	  return view('dashboard/payment-history',['respon'=>$respon]);
      }
}
