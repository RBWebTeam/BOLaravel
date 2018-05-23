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
class SearchLoanController extends CallApiController
{
	public function SearchLoan()
	{
		return view('SearchLoan');
	}
	public function SearchLoancallapi(Request $req)
	{
		//print_r($req->all());exit();
		try{
   	$data=array("searchText"=>$req->txtsearch,"empCode"=>"RB40000068","pgNo"=>"1");
 
   	 $post_data=json_encode($data);
   	// print_r($post_data); 
	      	    $result=$this->call_json_data_api('http://services.rupeeboss.com/LoginDtls.svc/xmlservice/dsplySearchResult',$post_data);
	            $http_result=$result['http_result'];
	            $error=$result['error'];
	            $st=str_replace('"{', "{", $http_result);
	            $s=str_replace('}"', "}", $st);
	            $m=$s=str_replace('\\', "", $s);
	            $update_user='';
	            $obj = json_decode($m);
	           print_r($m); exit();
                
              
               

                   if($obj->status='Success'){

                    	 $respon=($obj->result);
                    }else{
                     	 $respon=0;
                    }
                    //print_r($respon); exit();
	}
	catch (Exception $e){
        return $e;    
     }
        //print_r($respon);exit();
	  return view('SearchLoan',['respon'=>$respon]);
	  //return json_encode($respon);

	}

}