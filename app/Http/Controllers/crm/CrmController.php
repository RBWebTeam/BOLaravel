<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Response;
use Mail;
class CrmController extends Controller
{


        
         public function __construct(){
        $this->middleware(function ($request, $next) {
            
            if(!$request->session()->exists('UId')){
           
                     return redirect('/');
            }else{



            return $next($request);

          }

        });
    }

 

          public function user_role(Request $req){   // find column UID
 

                $profile_id=Session::get('UId');  
                $queryu=DB::table('finmartemployeemaster')->select('UId','Profile','role_id','Profile')->where('UId','=',$profile_id)->first();
                    // print_r($queryu->role_id);exit();
                     if($queryu->role_id){

                $query=DB::table('fbacrmmapping')->join('FBAMast', 'fbacrmmapping.fba_id', '=', 'FBAMast.FBAID')->where($queryu->role_id,'=',$profile_id)->select('fbacrmmapping.ID','fbacrmmapping.fba_id','FBAMast.FullName','FBAMast.MobiNumb1','FBAMast.EmailID','FBAMast.CreaOn','FBAMast.City')->get(); 
                
                //print_r($query);exit();
              }else{

                    return redirect('dashboard');
              }

          

          	   return view('crm.user_role',['query'=>$query]);
          }





            public function crm_disposition_fn(Request $req){
 
            				$history_db=DB::select('call sp_crm_view_history(?,?)',[$req->id,Session::get('UId')]);
                    //print_r($history_db);exit();
            				$query=DB::table('crm_disposition')
                     ->where('emp_category','=',Session::get('Profile'))->get();
            				return  view('crm.crm_disposition_view',['query'=>$query,'fbamappin_id'=>$req->id,'history_db'=>$history_db]);  
            }






            public function crm_disposition_id(Request $req){
             // print_r($req->all());exit();
             //echo json_encode($req->all());
                $find_profile="";
                $find_profile1="";
                $query=DB::table('crm_disposition')->where('id','=',$req->id)->first();               

               if($query->followup_internalteam!=null && $query->followup_internalteam!=''){
                $find_profile=$this->fbamappin_fn($query->followup_internalteam,$req->fbamappin_id); //followup_internalteam search
                                }

                if($query->followup_externalteam!=null && $query->followup_externalteam!=''){
                $find_profile1=$this->fbamappin_fn($query->followup_externalteam,$req->fbamappin_id); //followup_internalteam search
                }

                // check if dispostion id is already exist.
              $check=DB::select('call sp_check_history(?,?,?)',[$req->fbamappin_id,$req->id,Session::get('UId')]);
              if(count($check)>0){
                  $ischeck=1;
                  $fbamappin_id=$check['0']->fbamappin_id;
                  $crm_id=$check['0']->crm_id;
                  $history_id=$check['0']->history_id;
                   $aa=array('fbamappin_id'=>$fbamappin_id,'crm_id'=>$crm_id,'history_id'=>$history_id);

              }else{


                     $ischeck=0;
                     $aa=array('fbamappin_id'=>0,'crm_id'=>0,'history_id'=>0);
              }

          //    print_r($find_profile1."Zzzzz");exit;

                
                 
                  return Response::json(array("res"=>$query,'find_profile'=>$find_profile,'find_profile1'=>$find_profile1,'ischeck'=>$aa));       
            }


            public function fbamappin_fn($emp_profile_id,$fbamappin_id){  // find  Profile UID and fbacrmmapping UID
             // echo $fbamappin_id;

                      $findquery=DB::table('fbacrmmapping')->where('id','=',$fbamappin_id)->first();   
                      $array = json_decode(json_encode($findquery),true);
                      $finduid=0;
                        foreach ($array as $key => $value) {
                               if($key==$emp_profile_id){
                                   $finduid=$value;
                                  break;
                               }

                        }


          // echo "tetststststtsts".$finduid;
            if(isset($finduid)){
              $query=DB::table('finmartemployeemaster')->select('UId','Profile','EmployeeName')->where('UId','=',$finduid)->first();            
                return $query;

            }
                         
                
            }




          public function crm_disposition(Request $req){  
           
            if(isset($req->disposition_id)){
               if(isset($req->followup_date)){
                   $followup_date=$req->followup_date;
                }else{
                  $followup_date="";
                }

                 if(isset($req->assign_id) && isset($req->historyid)){ 
                   $assign_id=$req->assign_id;

                    DB::table('crm_followup')
                    ->where('history_id', $req->historyid)
                  //->where('destination', 'San Diego')
                  ->update(['followup_assign_id' =>  $assign_id]);

                } 
         


                  $history_id=DB::table('crm_history')->insertGetId([
                                  'disposition_id'=>$req->disposition_id,
                                  'user_id'=>Session::get('UId'),
                                  'crm_id'=>$req->crm_id,
                                  'fbamappin_id'=>$req->fbamappin_id,
                                  'create_at'=> date('Y-m-d H:i:s'),
                                  'followup_date'=>$followup_date,
                                  'remark'=>$req->remark,
                                  'action'=>$req->action,
                                  
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
/*if (isset($assignment_id)){

             $maildata=DB::select('call crm_get_followup_mail_data(?)',[$history_id]);
             $tomailid=DB::select('call crm_get_exception_mail_id(?)',[Session::get('UId')]);                 
             $ccmailid=DB::select('call crm_get_exception_mail_id(?)',[$req->assignment_id]);
                 //print_r($ccmail);exit();
             foreach ($tomailid as $key => $value) {
              $tomail=$value->EmailId;
             }
             foreach ($ccmailid as $key => $value) {
               $ccemail=$value->EmailId;
             }
              //$tomail='shubhamkhandekar2@gmail.com';
             // $ccemail='shubhamkhandekar2@gmail.com';
             $ccemail1='ashutosh.sharma@magicfinmart.com';
             $ccemail2='srinivas@policyboss.com';
              $sub='Sr no. #'.$maildata[0]->history_id.' You have assigned followup from '.$maildata[0]->EmployeeName.'-'.$maildata[0]->MobileNo;
                      
                  $mail = Mail::send('mailViews.Crm_followup_mail',['maildata' => $maildata], function($message)use($tomail,$ccemail,$sub,$ccemail1,$ccemail2){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);                 
                  $message->subject($sub);
                  $message->cc($ccemail);
                  $message->cc($ccemail1);
                  $message->cc($ccemail2);                 

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
          
           }*/
           }

               
            public function crm_followup(Request $req)
            {

                    $query=DB::select('call sp_crm_followup_details(?,?,?)',[$req->fbamappinid,$req->crmid,Session::get('UId')]);
                   // print_r($query);exit();
                      $fbadetails=DB::select('call crm_fba_followup_details(?)',[$req->fbamappinid]);
                    return  view('crm.crm_followup_view',['query'=>$query,'history_id'=>$req->history_id,'fbadetails'=>$fbadetails]);
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

 
                       $history_id=DB::table('crm_history')->insertGetId([
                                  'disposition_id'=>$req->disposition_id,
                                  'user_id'=>Session::get('UId'),
                                  'crm_id'=>$req->crm_id,
                                  'fbamappin_id'=>$req->fbamappin_id,
                                  'create_at'=> date('Y-m-d H:i:s'),
                                  'followup_date'=>$req->followup_date?$req->followup_date:null,
                                  'remark'=>$req->remark,
                                  'action'=>$req->action,
                                  'ch_id'=>$req->history_id,
                ]);

                if($req->action=="y"){
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



                      DB::table('crm_followup')->insert([
                                  'user_id'=>Session::get('UId'),
                                  'assignment_id'=>$assignment_id,
                                  'assign_external_id'=>$assign_external_id,
                                  'create_at'=> date('Y-m-d H:i:s'),
                                  'fbamappin_id'=>$req->fbamappin_id,
                                  'history_id'=>$history_id,
                                  ]);


                }else{

                       DB::table('crm_history')->where('history_id','=',$req->history_id)->update(['action'=>'n']);
                }

 

                 return  redirect("crm-disposition/".$req->fbamappin_id);
            }



 


            public function crm_new(Request $req){

            //            if(isset($_GET['assign_id'])){
            //                 $assign_id=$_GET['assign_id'];
            //            }else{
            //                 $assign_id=null;
            //            }

                        

            //         $history_db=DB::select('call sp_crm_view_history(?,?)',[$req->fbamappin_id,Session::get('UId')]);
            //         $query=DB::table('crm_disposition')->where('emp_category','=','Recruiter')->get();
            //         return  view('crm.crm_disposition_add',['query'=>$query,'fbamappin_id'=>$req->fbamappin_id,'history_db'=>$history_db,'assign_id'=>$assign_id]);  
            // 
       
                       if(isset($_GET['assign_id']) && isset( $_GET['history_id'])){
                            $assign_id=$_GET['assign_id'];
                            $historyid=$_GET['history_id']; 
                            
                       }else{
                            $assign_id=null;
                            $historyid=null;
                       }
 

                    $history_db=DB::select('call sp_crm_view_history(?,?)',[$req->fbamappin_id,Session::get('UId')]);
                    $fbadetails=DB::select('call crm_fba_followup_details(?)',[$req->fbamappin_id]);
                    
                    $query=DB::table('crm_disposition')->where('emp_category','=',Session::get('Profile'))->get();
                    return  view('crm.crm_disposition_add',['query'=>$query,'fbamappin_id'=>$req->fbamappin_id,'history_db'=>$history_db,'assign_id'=>$assign_id,'historyid'=>$historyid,'fbadetails'=>$fbadetails]);  
}
public function getcrmexception($discompostion)
{
   //print_r($discompostion);exit();
   $exception=DB::select('call crm_get_exception(?)',[$discompostion]);
  // print_r($exception);exit();
   foreach ($exception as $key => $value) {
    $role_id=$value->followup_internalteam;
   }
   if ($role_id!='') {
    $exceptiondata=DB::table('crmexception')->select($role_id)->first();
    foreach ($exceptiondata as $key => $value) {
      $uid=$value;
    }
   //print_r($uid);exit();
    $query=DB::table('finmartemployeemaster')->select('UId','Profile','EmployeeName')->where('UId','=',$uid)->first(); 
    //print_r($query);exit();
   return json_encode($query);
   }
   
}

}

