<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HealthAssurePartnerController extends CallApiController
{
 public function getpartnerinfo(){
 	try{
   	$data=array("apptrebook_input"=>null,"status_input"=>null,"apptdetail"=>null,"pack_details"=>null,"slot_inputdata"=>null,"provider_data"=>array("username"=>"Datacomp","password"=>"Health@1234","latitude"=>"19.1629437","longitude"=>"72.8353005","packcode"=>71,"visittype"=>"CV","apptdatetime"=>"30-03-2018"),"pack_param"=>null);
      //print_r($data);exit();
   	 $post_data=json_encode($data);
   	// print_r($post_data); exit();
	      	    $result=$this->call_json_data_api('http://www.healthassure.in/Products/HAMobileProductService.asmx/getProviderList',$post_data);
	            $http_result=$result['http_result'];
	            $error=$result['error'];
	            $st=str_replace('"{', "{", $http_result);
	            $s=str_replace('}"', "}", $st);
	            $m=$s=str_replace('\\', "", $s);
	            $update_user='';
	            $obj = json_decode($m);
	           //print_r($m); exit();
                
              
               

                   if($obj->d->status='Success'){

                    	 $respon=($obj->d->service_provider_listdata);
                    }else{
                     	 $respon=0;
                    }
                    //print_r($respon); exit();
	}
	catch (Exception $e){
        return $e;    
     }
 	return view('dashboard.HealthAssurePartner',['respon'=>$respon]);
 }
}

