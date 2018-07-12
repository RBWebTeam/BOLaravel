<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Response;
class CrmController extends Controller
{



          public function user_role(Request $req){   // find column UID
               $profile_id=Session::get('UId');
               $query=DB::table('finmartemployeemaster')->select('UId','Profile','role_id')->where('UId','=',$profile_id)->first();
               $query=DB::table('fbacrmmapping')->where($query->role_id,'=',$profile_id)->get(); 
          	   return view('crm.user_role',['query'=>$query]);
          }





            public function crm_disposition_fn(Request $req){
            				$history_db=DB::select('call sp_crm_view_history(?)',[$req->id]);
            				$query=DB::table('crm_disposition')->where('emp_category','=','Recruiter')->get();
            				return  view('crm.crm_disposition_view',['query'=>$query,'fbamappin_id'=>$req->id,'history_db'=>$history_db]);  
            }






            public function crm_disposition_id(Request $req){
                $find_profile="";
                $find_profile1="";
                $query=DB::table('crm_disposition')->where('id','=',$req->id)->first();

               if($query->followup_internalteam!=null && $query->followup_internalteam!=''){
                $find_profile=$this->fbamappin_fn($query->followup_internalteam,$req->fbamappin_id); //followup_internalteam search
                }

                if($query->followup_externalteam!=null && $query->followup_externalteam!=''){
                $find_profile1=$this->fbamappin_fn($query->followup_externalteam,$req->fbamappin_id); //followup_internalteam search
                }

                
                  return Response::json(array("res"=>$query,'find_profile'=>$find_profile,'find_profile1'=>$find_profile1));       
            }


            public function fbamappin_fn($emp_profile_id,$fbamappin_id){  // find  Profile UID and fbacrmmapping UID
                      $findquery=DB::table('fbacrmmapping')->where('id','=',$fbamappin_id)->first();   
                      $array = json_decode(json_encode($findquery),true);
                      $finduid=0;
                        foreach ($array as $key => $value) {
                               if($key==$emp_profile_id){
                                   $finduid=$value;
                                  break;
                               }
                        }
           
            if(isset($finduid)){
              $query=DB::table('finmartemployeemaster')->select('UId','Profile')->where('UId','=',$finduid)->first();
                return $query;
            }else{
              return 0;
            }
                         
                
            }




          public function crm_disposition(Request $req){
            if(isset($req->disposition_id)){
               if(isset($req->followup_date)){
                   $followup_date=$req->followup_date;
                }else{
                  $followup_date="";
                }
                  $history_id=DB::table('crm_history')->insertGetId([
                                  'disposition_id'=>$req->disposition_id,
               	                  'user_id'=>Session::get('UId'),
               	                  'crm_id'=>$req->crm_id,
               	                  'fbamappin_id'=>$req->fbamappin_id,
               	                  'create_at'=> date('Y-m-d H:i:s'),
               	                  'followup_date'=>$followup_date,
               	                  'remark'=>$req->remark,
               	                  'action'=>$req->action
               	 ]);

                if(isset($req->assignment_id)){
                   $assignment_id=$req->assignment_id;
                }else{
                   $assignment_id=null;
                }

                 if(isset($req->assign_external_id)){
                   $assign_external_id=$req->assign_external_id;
                }else{
                   $assign_external_id=null;
                }
               
                if($req->action=="y"){
                   $user_id=Session::get('UId');
                }else{
                    $user_id=null;
                }

                if(isset($user_id) || isset($assignment_id)){

                   DB::table('crm_followup')->insert([
                                  'user_id'=>$user_id,
                                  'assignment_id'=>$assignment_id,
                                  'assign_external_id'=>$assign_external_id,
                                  'create_at'=> date('Y-m-d H:i:s'),
                                  'fbamappin_id'=>$req->fbamappin_id,
                                  'history_id'=>$history_id,
                                  ]);
                                  
                           }

                      }
           }
 

               
            public function crm_followup(Request $req){
                    $query=DB::select('call sp_crm_followup_details(?)',[Session::get('UId')]);
                    return  view('crm.crm_followup_view',['query'=>$query]);
            }


            public function  followup_disposition_view(Request $req){     
                    $query=DB::select('call sp_crm_followup_disposition_view(?)',[$req->historyid]);
                    return Response::json(array("res"=>$query[0]));         
            }




            public function  followup_history(Request $req){
              $query=DB::select('call sp_followup_history(?,?)',[$req->fbamappin_id,$req->disposition_id]);
               return Response::json(array("result"=>$query));       
            }


            public function followup_history_update(Request $req){

                if($req->action=="y"){
  
                       DB::table('crm_history')->where('history_id','=',$req->historyid)->update(['action'=>'n']);

 
                       $history_id=DB::table('crm_history')->insertGetId([
                                  'disposition_id'=>$req->disposition_id,
                                  'user_id'=>Session::get('UId'),
                                  'crm_id'=>$req->crm_id,
                                  'fbamappin_id'=>$req->fbamappin_id,
                                  'create_at'=> date('Y-m-d H:i:s'),
                                  'followup_date'=>$req->followup_date,
                                  'remark'=>$req->remark,
                                  'action'=>$req->action
                ]);

                }else{
                     echo "close";
                }
            }



}
