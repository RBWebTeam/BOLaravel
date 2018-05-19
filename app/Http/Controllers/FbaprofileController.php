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
class FbaprofileController extends Controller
{
	public function fbaprofileview($fbaid)
	{
		$Genins=DB::select("call Usp_load_Generalins()");
		$lifeins=DB::select("call Usp_load_lifeinsurence()");
		$healthins=DB::select("call Usp_load_healthins()");
		$fbadetails=DB::select("call GET_fbadetails_in_fbaprofile($fbaid)");
	     return view('FbaProfile',['Genins'=>$Genins,'lifeins'=>$lifeins,'healthins'=>$healthins,'fbadetails'=>$fbadetails]);
	}
	
	public function Insertfbaprofile(Request $req)
	{
            $id=Session::get('fbauserid');
		    $validator =Validator::make($req->all(), [
                                            ]);
             if ($validator->fails()) {
           
            }else{
           $FbaProfileid=DB::statement('call Usp_insert_fbaprofile(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
		 	$req->iscompany,
		 	$req->txtbusinesstype,
		 	$req->txtofficeadd,
		 	$req->txtstaff,
		 	$req->isWorksLIC,
		 	$req->txtnoofpolicy,
		 	$req->txtpremium,
		    $req->txtlicproduct,
		 	$req->txtliccustomer,
		 	$req->txtlicclub,
		 	$req->isWorksLICins,
		 	$req->txthl,
		 	$req->txtpl,
		 	$req->txtlap,
		 	$req->txtbl,
		 	$req->txtloan,
		 	$req->txtotherloan,
		 	$req->txtMutualfund,
		 	$req->txtPostal,
		 	$req->txtFixed,
		 	$req->txtother,
		 	$req->txtotherremark,
		 	$req->txtremark,
		 	$req->txtfbaid, 
		 	$id,
		 	$req->lifeinsucomp,
		 	$req->generatlinsucomp,
		 	$req->healthinuscomp
		    ));			   
	   }
	   // if($req->isWorksLICins==1){
	   // 	DB::statement('call Usp_insert_PrivateLifeInsurers(?,?,?)',array($FbaProfileid,$req->privetlifeco,$req->isWorksLICins));
	   // }
              Session::flash('message', 'Record has been saved successfully'); 
		   // print_r($rea->all()); exit();			
        
	}

	public function getfbaprofile($fbaid)
	{
       $FbaProfile=DB::select("call Usp_get_fabprofiledata($fbaid)");
       //print_r($FbaProfile);exit();
       return json_encode($FbaProfile);
       
	}
}



  

  
  
   
 

 
  
 
 
  
   
    
     
      
       
 
 
  
  
