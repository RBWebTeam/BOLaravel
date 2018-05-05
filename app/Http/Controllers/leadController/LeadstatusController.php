<?php

namespace App\Http\Controllers\leadController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Validator;
use Redirect;

class LeadstatusController extends Controller
{
     

        public function lead_status(Request $req){

                
                
        }


        public function assign_task(Request $req){

        	 // follow up details   table

        	 // $query=DB::select('call sp_raw_lead_master(?)',array(Session::get('fbauserid')));
        	  $userlist=DB::select('call sp_assign_list()');   
        	  $assign_task=DB::select('call sp_assign_task()');  

   	  
   

             return view('lead_view.assign_task',['assign_task'=>$assign_task,'userlist'=>$userlist]);

        }


        public function assign_task_save(Request $req){
            $validator =Validator::make($req->all(), [
              'user_id' =>'required|not_in:0',
              'lead_id' =>'required|not_in:--SELECT--',
              
                            ]);
             if ($validator->fails()) {
             return redirect('assign-task')
             ->withErrors($validator)
             ->withInput();
            }else{



              
              foreach ($req->lead_id as $key => $val) {
                        
                       DB::table('raw_lead_master')->where('id','=',$val)->update([ 'user_id'=>$req->user_id]);
              }
                 
                   
            Session::flash('msg', "Successfully Assign Task.. ");
                       return Redirect::back();
             
             }


        }


        public function followup_history(Request $req){

           $followup_lead=DB::select('call sp_followup_lead_history(?)',array($req->ID));

    return $followup_lead;
}


public function lead_assgin_list(){

       $lead_assgin=DB::select('call sp_assign_leadd_list()');
    return view('lead_view.lead_assgin_list');


}


public function lead_assgin_list_get(){

 
    $query=DB::select('call sp_assign_leadd_list()');
   return json_encode(["data"=>$query]);
}



}
