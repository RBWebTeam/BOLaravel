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



class finmartempBirthdayController extends CallApiController{

	       public function viewsmstemplate(){
         $todays_bday_result=DB::select("call birthday_msg()");


 foreach($todays_bday_result as $bday){

          $FBAID = $bday -> FBAID;
          $FullName = $bday -> FullName;
          $DOB = $bday -> DOB;
          $EmailID = $bday -> EmailID;
          $EmailTemplate = $bday -> EmailTemplate;
          $MobiNumb1= $bday -> MobiNumb1;

   
      $Sms_text = $template_result[0]->Sms_text;
      
$to_send_SMS = preg_replace('/##FNAMEMO##/i', $FullName, $Sms_text);

    $text="Birthday Wishes";
    $newsms = urlencode($to_send_SMS);
      //print_r($newsms); exit();
        $post_data="";
          

$result=$this->call_json_data_api('http://sms.cell24x7.com:1111/mspProducerM/sendSMS?user=rupee&pwd=apirupee&sender=FINMRT&mobile='.$MobiNumb1.'&msg='.$newsms.'&mt=0',$post_data);
       $http_result=$result['http_result'];
       $error=$result['error'];
       $st=str_replace('"{', "{", $http_result);
       $s=str_replace('}"', "}", $st);
       $m=$s=str_replace('\\', "", $s);
       $obj = json_decode($m);
       //return $obj;
     if (Mail::failures()) {
       DB::select('call usp_insert_finmart_bday_entrys(?,?,?)',array($FBAID,0,$EmailTemplate));
}else{
       DB::select('call usp_insert_finmart_bday_entrys(?,?,?)',array($FBAID,1,$EmailTemplate));

   }

}

//Send email
       foreach($todays_bday_result as $bday){

       		$FBAID = $bday -> FBAID;
       		$FullName = $bday -> FullName;
       		$DOB = $bday -> DOB;
       		$EmailID = $bday -> EmailID;
       		$EmailTemplate = $bday -> EmailTemplate;
       		$MobiNumb1= $bday -> MobiNumb1;

      $template_result = DB::select("call send_birthday_template(?)",array($EmailTemplate));
			$temp_html = $template_result[0]->temp_html;
			$to_send_body = preg_replace('/##FNAME##/i', $FullName, $temp_html);

			$Sms_text = $template_result[0]->Sms_text;
			$to_send_SMS = preg_replace('/##FNAMEMO##/i', $FullName, $Sms_text);

$mail = Mail::send('mailViews.birthday_mail',['to_send_body'=>$to_send_body],function($message)use($EmailID){
                  $message->from('OfflineCS@magicfinmart.com', 'Magicfinmart');
                  $message->to($EmailID)->subject('Birthday Wishes');
               	  //$message->setBody($to_send_body)('text/html');
             
               });

		$text="Birthday Wishes";
		$newsms = urlencode($to_send_SMS);
    	//print_r($newsms); exit();
      	$post_data="";
      		

// $result=$this->call_json_data_api('http://sms.cell24x7.com:1111/mspProducerM/sendSMS?user=rupee&pwd=apirupee&sender=FINMRT&mobile='.$MobiNumb1.'&msg='.$newsms.'&mt=0',$post_data);
    //print_r($result);

       $http_result=$result['http_result'];
  	   $error=$result['error'];
       $st=str_replace('"{', "{", $http_result);
       $s=str_replace('}"', "}", $st);
       $m=$s=str_replace('\\', "", $s);
       $obj = json_decode($m);
       //return $obj;
     if (Mail::failures()) {
       DB::select('call usp_insert_finmart_bday_entrys(?,?,?)',array($FBAID,0,$EmailTemplate));
}else{
    	 DB::select('call usp_insert_finmart_bday_entrys(?,?,?)',array($FBAID,1,$EmailTemplate));

   }

}

        //return view('finmart-emp-birthday',['todays_bday_result'=>$todays_bday_result]);
}


     //SEND SMS START
}