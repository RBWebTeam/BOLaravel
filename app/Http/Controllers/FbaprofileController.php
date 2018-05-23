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
		$fbaupdate=DB::select("call Usp_get_fbaupdatedhistory($fbaid)");
	     return view('FbaProfile',['Genins'=>$Genins,'lifeins'=>$lifeins,'healthins'=>$healthins,'fbadetails'=>$fbadetails,'fbaupdate'=>$fbaupdate]);
	}
	
	public function Insertfbaprofile(Request $req)
	{
            $id=Session::get('fbauserid');	           
      
           DB::statement('call Usp_insert_fbaprofile(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
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
		 	$req->healthinuscomp,
		 	$req->club
		    ));	   
	     return "successfully";		
        
	}

	public function getfbaprofile($fbaid)
	{
		try {
			$FbaProfile=DB::select("call Usp_get_fabprofiledata($fbaid)");
       		return json_encode($FbaProfile);
		} catch (Exception $e) {
			print_r($e);	
		}
       
	}

	public function getfbaprofilecompanymapping($profileid)
	{
		try {
			//print_r($profileid);exit();
			$FbaProfile=DB::select("call usp_get_profilecompanymapping($profileid)");
       		return json_encode($FbaProfile);
		} catch (Exception $e) {
			print_r($e);	
		}
       
	}
}



  

  
  
   
 

 
  
 
 
  
   
    
     
      
       
 
 
  
  
