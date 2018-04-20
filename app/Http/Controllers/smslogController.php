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
class smslogController extends Controller
{

	public function getsmslog(){

		$query=DB::select("call Usp_getsmslog()");
		
 return view('dashboard.sms_log',['query'=>$query]);

	 }



  // SMS TEMPLATE CONTROLLE
  // public function smstemplate(){
  // return view('dashboard.sms_template');

	 //}
	  public function smstemplateinsert (Request $req){
              
       DB::statement('call Usp_insertsmstaplate(?,?)',array( $req->hname,$req->txtmesg ));
        return view('dashboard.sms_template');
            }
  
  public function getsendsmslog(){ 
 $sendsms=DB::select("call usp_load_sms_log()");

 return view ('dashboard.send-sms-log',['sendsms'=>$sendsms]);
}









 // SMS TEMPLATE CONTROLLE
  public function smstemplate(){
  return view('dashboard.sms_template');

   }
  
        public function insert_template_demo(Request $req){

            DB::table('SMSTemplate')->insert([
          ['Header' =>$req->hname,
           'Template' => $req->txtmesg,
           'CreatedBy' => session()->get('fbaid')],

          ]);

            return Redirect ('sms_template');
        }

         public function template_demo()

        { 

           $smsdata=DB::select("call usp_getsmsdata()");

          return view('dashboard.table_template',['smsdata'=>$smsdata]);
        }



         public function templetedelete($id)
         {
          // print_r($req->SMSTemplateId); exit();
          DB::delete('delete from smstemplate where SMSTemplateId= ?' ,[$id]);
            return Redirect('view_templete_table');

          }


         public function table_edit($id)
         {

            $user=DB::table('SMSTemplate')
            ->select('SMSTemplateId','Header','Template')
            ->where('SMSTemplateId','=',$id)->first();
             return view('dashboard.edit_table_template',["user"=>$user]);


             }



          //   $users = DB::table('smstemplate')
          //   ->select('SMSTemplateId','Header','Template')
          //   ->where('SMSTemplateId',$id)
          //   ->get();
          // // view('edit_table_template')->with($users);
          //  return View::make('dashboard.edit_table_template')->with('users',$users);
         




       // public function edit_value_update($id){

       //    $arra= array('Header'=>$req->smshead,'Template'=>$req->smsbody);

      //          $que=DB::table('smstemplate')->where('SMSTemplateId',$req->SMSTemplateId)->update($arra);
             
      //         return view('edit_table_template');

      //      }

          // public function edit_value_update($id){


          //   $Header =$req->input('smshead');
          //   $Template =$req->input('smsbody');

          //   $data = array('Header'=>$smshead,"Template"=>$smsbody);

          //   DB::table('smstemplate')->edit_value_update($data);
          
          // }


       public function update_sms_table(Request $req)
       {
          $arra= array('Header'=>$req->smshead,'Template'=>$req->smsbody);
          $que=DB::table('SMSTemplate')->where('SMSTemplateId','=',$req->fbaid)->update($arra);
           return redirect('view_templete_table');
       }

 }

