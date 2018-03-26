<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthAssureController extends CallApiController
{
   public function gethealthassure(){
try{
   	$data=array("pack_param"=> array("username"=>"Datacomp","pass"=>"Health@1234","packcode"=>191));
 
   	 $post_data=json_encode($data);
   	// print_r($post_data); exit();
	      	    $result=$this->call_json_data_api('http://www.healthassure.in/Products/HAMobileProductService.asmx/PackParam',$post_data);
	            $http_result=$result['http_result'];
	            $error=$result['error'];
	            $st=str_replace('"{', "{", $http_result);
	            $s=str_replace('}"', "}", $st);
	            $m=$s=str_replace('\\', "", $s);
	            $update_user='';
	            $obj = json_decode($m);
	           // print_r($m); exit();
                
              
               

                   if($obj->d->status='Success'){

                    	 $respon=($obj->d->lstPackParameter);
                    }else{
                     	 $respon=0;
                    }
                    //print_r($respon); exit();
	}catch (Exception $e){

	  return $e;    
     }
        
                 
      	  return view('dashboard.HealthAssure',['respon'=>$respon]);
      }
   
}
