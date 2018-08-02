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
class manageemploeeController extends CallApiController{


	public function finemployeeview(){

  return view('dashboard.finmartemployee-details');
}

	public function allemployeedata(){
		  //$query=[];
	$query=DB::select("call get_finmartemployeemaster_data()");
	 

	 return view('dashboard.finmartemployee-details',['query'=>$query]);

}
 

 		public function viewmaageemployy($uid){
 		$data=DB::select("call get_employee_by_uid('$uid')");
 		$catgory=DB::select("call get_finmartemployeemaster_Category()");
 		$digngtion=DB::select("call get_finmartemployeemaster_Designation()");     
        $role=DB::select("call get_finmartemployeemaster_roal_id()"); 
        $profilesave=DB::select("call get_finmartemployeemaster_profile()");
        $status=DB::select("call get_Employee_Status()"); 
 


		return view('dashboard.manage-employee',['data'=>$data,'catgory'=>$catgory,'digngtion'=>$digngtion,'role'=>$role,'profilesave'=>$profilesave,'status'=>$status]);
}


         public function update_emp_details(Request $req){
        
    //$id=Session::get('fbauserid');
		DB::select('call usp_update_emp_details(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
		$req->sfbaid, 
		$req->euid,   
		$req->efbid, 
		$req->eroleid,
   	 	$req->ename, 
    	$req->emobile,  
    	$req->eemail,
    	$req->offclmob,
    	$req->offclemail, 
   	 	$req->eprofile,
   	 	$req->edesignation,
   	 	$req->ecatgory,   		
   		$req->estatus,
   		$req->emolocation,

    	
));

		 return redirect('emp-details');
}


		public function addfbaemp(){

		$profileadd=DB::select("call get_finmartemployeemaster_profile()"); 
 		$catgoryadd=DB::select("call get_finmartemployeemaster_Category()");
 		$digngtionadd=DB::select("call get_finmartemployeemaster_Designation()");
 		$roleadd=DB::select("call get_finmartemployeemaster_roal_id()"); 
 		$statusadd=DB::select("call get_Employee_Status()"); 
     
return view('dashboard.add-employee',['profileadd'=>$profileadd,'catgoryadd'=>$catgoryadd,'digngtionadd'=>$digngtionadd,'roleadd'=>$roleadd,'statusadd'=>$statusadd]);
}



         public function new_emp_add(Request $req){
        
    //$id=Session::get('fbauserid');
		DB::select('call usp_insert_new_finemployee(?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
   	 	$req->euid,  
   	 	$req->efbid,  
   	 	$req->eroleid,    
   	 	$req->ename, 
    	$req->emobile,  
    	$req->eemail,
    	$req->offclmob,
    	$req->offclemail, 
   	 	$req->eprofile,
   	 	$req->ecatgory,
   		$req->edesignation,
   		$req->estatus,
   		$req->emolocation, 
    	
));

		 return redirect('add-employee');
}
}






    



