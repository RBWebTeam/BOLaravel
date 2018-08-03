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


class prodouctleaddetailsController extends CallApiController
{

       public function viewlead_details()
         {
     	      $ldata=DB::select("call usp_load_lead_details()");
		      return view('prodouct-lead-details',['ldata'=>$ldata]);	
         }

       public function fbalocation($lat,$long)
         { 
         	$fbadata=DB::select("call Usp_get_fbaid_onlatlong($lat,$long)");
         	
            foreach ($fbadata as $val)
               {                  
                  $Token=$val->TokeId;
               }   

              
                try{
                  $data= array( "to"=>"$Token", array("notifyFlag"=> "OPT","img_url"=>"http://i.stack.imgur.com/CE5lz.png", "body"=>"this is Different Data Daniyal this is Different Data Rahul this is Different Data Umesh this is Different Data Vinit this is Different Data Nilesh this is Different Data DaRajeevniyal ", "title"=>"PushNotification from Data120 Daniyal...", "web_url"=>"http://www.rupeeboss.com", "web_title"=> "Demo","message_id" =>"1"));
                 //print_r($data);exit();
                  $token=array("cache-control: no-cache","content-type: application/json",
                    "Authorization:key=AAAAS_NxFJ0:APA91bHaDvrs7g_ezcnzlMX-oM21lcR9quuKll2ISo6QwcL1gESfavPUA7sRcnBanttfJjDHaaiWdPQ_ykEyjLKySdKk8Zyll-SN6PnvY--UXWqq8IfFuEYSvkDKoZPsrIEOX-h9D0sD",
                    "Sender:326206821533");
                  $post_data=json_encode($data);
                  //print_r($token);exit();

                  $type=$token;
                  $result=$this->call_other_data_api('https://fcm.googleapis.com/fcm/send',$post_data,$type);              
                  $Response= json_decode($result['http_result']);
                  //$shorturl=$Response->MasterData[0]->ShortURL;
                  print_r($result);exit();
                  
                }
                catch (Exception $e){
              
                      return $e->getMessage();    
                   }        
                      
     }



}
