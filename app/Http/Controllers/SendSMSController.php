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

class SendSMSController extends Controller{


    public function ViewSendSMSDetails(Request $req){
   

               //  $query=DB::select("call usp_loadfsm_list(?)",[2]);
                    
                   if(isset($req->ID)){
                      return DB::select('call sp_fba_sentSMS(?,?,?,?)',[0,0,0,0]);

                   }

                   if(isset($req->city) && isset($req->ID)){
                        $arr=DB::select('call sp_fba_sentSMS(?,?,?,?)',[1,$req->city,0,0]);

                        
                      

                   }

                   if(isset($req->fDate) && isset($req->tDate)  ){
                     return DB::select('call sp_fba_sentSMS(?,?,?,?)',[2,0,$req->fDate,$req->tDate]);

                   }


 

                 return view('dashboard/send-sms');
       

    }


    public function send_sms_save(Request $req){  

            if(isset($req->fba))
             foreach ($req->fba as $key => $fba_id) {
            $query=DB::table('FBAMast')->select('FullName','MobiNumb1','EmailID')->where('FBAID','=',$fba_id)->first();
               
                
             }

    }
}

  