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
class getcrmidController extends CallApiController
{
	public function getcrm_id($fbaid)
	{ 
		//print_r($fbaid);exit();
            
            $crm_id=DB::select("call crm_id_on_fbaid($fbaid)");
           //print_r($crm_id);exit();
           foreach ($crm_id as $key => $value){
             $crmid= $value->id;
           //print_r($crmid);
           }
          if ($crmid!==''){
          return Redirect('crm-disposition/'.$crmid);
          }else{
          	 return Redirect('fba-list');
          }
          
          
	}
}