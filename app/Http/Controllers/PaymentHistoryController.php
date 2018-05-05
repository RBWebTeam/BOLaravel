<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Excel;

class PaymentHistoryController extends CallApiController
{
     

      public function payment_history(Request $req){

      	    try{
                
                if(isset($req->fdate) && isset($req->todate)){
	      	     $data=array("FromDate"=>$req->fdate,"ToDate"=>$req->todate);
	      	 }else{
                 $data=array("FromDate"=>Date('m-d-Y', strtotime("-28 days")),"ToDate"=>Date('m-d-Y'));
                
	      	 }

	      	    $post_data=json_encode($data);
	      	    $result=$this->call_json_data_api('http://mswebapi.magicsales.in/api/CommonAPI/GETPaymTrackDeta',$post_data);
	            $http_result=$result['http_result'];
	            $error=$result['error'];
	            $st=str_replace('"{', "{", $http_result);
	            $s=str_replace('}"', "}", $st);
	            $m=$s=str_replace('\\', "", $s);
	            $update_user='';
	            $obj = json_decode($m);
             if($obj->message->Status='1'){
              


                    	 $respon=($obj->message->lstPaymTrackDeta);

 
                           
                            if(isset($req->export)){  
                               	    $data = json_decode( json_encode($respon), true) ;
							        return Excel::create('payment-history', function($excel) use ($data) {
							            $excel->sheet('mySheet', function($sheet) use ($data)
							            {
							                $sheet->fromArray($data);
							            });
							        })->download('xls');
                               }



                    	   


                    	 return view('dashboard/payment-history',['respon'=>$respon]);
           }                  
	}catch (Exception $e){
     
    return view('500');
   
   }


                 
      	 
      }
}
