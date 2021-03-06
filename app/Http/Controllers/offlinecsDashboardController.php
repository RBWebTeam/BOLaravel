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
class OfflinecsDashboardController extends Controller
{
	public function getofflinecsdata()
	{
		$fbauser=Session::get('fbauserid');
		$data=DB::select("call Usp_get_offlinecs_data_view($fbauser)");
		//print_r($data); exit();
		 return view('offlinecsDashboard',['data'=>$data]);
	}
	public function sendemail($ID)
	{
               $email ='rajendra.raval@rupeeboss.com';
               $ccemail='vishakha.kadam@policyboss.com';
               $ccemail1='OfflineCS@magicfinmart.com';  
               $ccemail2='rajendra.raval@policyboss.com';
                //$email ='shubhamkhandekar2@gmail.com';
               // $ccemail='rajendra.raval@policyboss.com';
                $offlinecsdata = DB::select("call Usp_get_motor_data($ID)");    

                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($ccemail!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($email,$ccemail,$ccemail1,$ccemail2,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($email)->cc($ccemail)->cc($ccemail1)->cc($ccemail2)->subject($sub);});
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
              DB::table('offlinecs')->where('ID','=',$ID)->update(['ismailsend'=>1]);
             }
             
    }
    public function showdetails($ID)
    {
       $offlinecsdata = DB::select("call Usp_get_motor_data($ID)");
       return json_encode($offlinecsdata);
    }
    public function updatecsid(Request $req)
    {
       $fbauser=Session::get('fbauserid');
       DB::select('call Usp_update_csid_offlinecs(?,?,?)',array(
        $req->txtcsid,
        $fbauser,
        $req->txtID));
       
    }
 
}

