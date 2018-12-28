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
		DB::select('call usp_update_emp_details(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
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
      $req->boaccess, 
      $req->pospaccess, 
      $req->paysystem,
      $req->emptype, 
      $req->emolocation,
      $req->ugropid

 ));

		 return redirect('emp-details');
}


		public function addfbaemp(){

		$profileadd=DB::select("call get_finmartemployeemaster_profile()"); 
 		$catgoryadd=DB::select("call get_finmartemployeemaster_Category()");
 		$digngtionadd=DB::select("call get_finmartemployeemaster_Designation()");
 		//$roleadd=DB::select("call get_finmartemployeemaster_roal_id()"); 
 		$statusadd=DB::select("call get_Employee_Status()"); 
     
return view('dashboard.add-employee',['profileadd'=>$profileadd,'catgoryadd'=>$catgoryadd,'digngtionadd'=>$digngtionadd,'statusadd'=>$statusadd]);
}

      public function getroleid($id){
      $roleid=DB::select("call usp_get_role_id('$id')");
       return json_encode($roleid);

   }

      public function getugroupid($id){
    $usgroupid=DB::select("call usp_user_group_id('$id')");
      return json_encode($usgroupid);
           
          

   }




public function new_emp_add(Request $req){
        
    //$id=Session::get('fbauserid');
		DB::select('call usp_insert_new_finemployee(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
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
      $req->boaccess, 
      $req->pospaccess, 
      $req->paysystem, 
      $req->emolocation,
      $req->emptype,
      $req->ugropid
    	
));

	  return redirect('emp-details');
}

  public function getfbadata(Request $req){ 
         $data = DB::select("call get_finemp_fba_data(?)",array($req->id));
         return response()->json($data);
   }  

  public function getuiddata(Request $req){ 
      $data = DB::select("call get_finemp_uid_data (?)",array($req->id));
 
     $uid=$this->veryfyuid("http://landmarktimes.policyboss.com/EIS/JSON_Test/Validate_UID_For_BO.php?unm=$req->id");

      if($data[0]->UId == $req->id){
        $existed_local_db_flag = "1";
      }
      else{
        $existed_local_db_flag = "0";
      }

      $response['existed_db'] = $existed_local_db_flag;
      $response['api_db'] = $uid;

      return response()->json($response);
         
   }  


   public function veryfyuid($url){
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
 
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  return  $err;
} else {
 return  $response;
}
}

}






    



