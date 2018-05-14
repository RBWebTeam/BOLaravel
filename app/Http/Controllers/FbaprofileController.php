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
	public function fbaprofileview()
	{
		$Genins=DB::select("call Usp_load_Generalins()");
		$lifeins=DB::select("call Usp_load_lifeinsurence()");
		$healthins=DB::select("call Usp_load_healthins()");
	     return view('FbaProfile',['Genins'=>$Genins,'lifeins'=>$lifeins,'healthins'=>$healthins]);
	}
	
	public function Insertfbaprofile(Request $req)
	{
            $id=Session::get('fbauserid');
		    $validator =Validator::make($req->all(), [
              'txtbusinesstype' =>'required',
                                  ]);
             if ($validator->fails()) {
             return redirect('Fba-profile')
             ->withErrors($validator)
             ->withInput();
            }else{
           DB::statement('call Usp_insert_fbaprofile(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
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
		 	0, 
		 	$id, 
		    ));		  
	   }
              Session::flash('message', 'Record has been saved successfully'); 
		   // print_r($rea->all()); exit();			
        return redirect('Fba-profile');
	}
}



  

  
  
   
 

 
  
 
 
  
   
    
     
      
       
 
 
  
  
