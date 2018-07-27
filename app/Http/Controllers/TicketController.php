<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Validator;
use Redirect;
use Mail;
use url;
use App\Jobs\Ticket_mail;
use Carbon\Carbon;
use Exception;
//use Illuminate\Support\Facades\Validator;
class TicketController extends ApiController
{
public function ticket_request(Request $req){
if(isset($req->TicketRequestId)){
$comment=DB::select('call sp_ticket_comment_list('.$req->TicketRequestId.')');
return  $comment;
}
$query=DB::select('call sp_ticket_request_list()');
$users=DB::select('call sp_assign_list()');
return view('ticket.ticket_request',['query'=>$query,'users'=>$users]);
}
public function ticket_request_save(Request $req){   
   


$error=''; 
try{
 if(isset($req->toemailid)){


 if($req->ccemailid){

 $resu=$this->mail_fn($req->toemailid,explode(',',$req->ccemailid),$req->TicketRequestId); 

  }
 else
  {
  $resu=$this->mail_fn($req->toemailid,[],$req->TicketRequestId); 
  }

    DB::table('TicketRequest')->where('TicketRequestId','=',$req->TicketRequestId)->update(['user_fba_id'=>$req->FBAUserId,'assigned_date'=>  date('Y-m-d H:i:s')]);
    $error=0;
    }
    }catch (Exception $e){
   $error=1;  
   }
   return $error;










try{

 
// Ticket ID:10 
// Category:Product 
// SubCategory:Home Loan 
// Ticket Summary 
// danial 
// Attachment:If any;

  $fbadata=DB::select('call usp_get_ticket_mail_data(?)',array($req->TicketRequestId));

// $view = View::make('ticket/ricket_mail_view', ['data' => $fbadata]);
// $contents = (string) $view;
// // or
// $contents = $view->render();

 print_r($fbadata);
 
$message = '<html><body>';
$message .= '<p>Dear [Developer], <br>A Ticket has been assigned to you,Kindly find the details below.</p>';
$message .= '<p>FBAID :'.$fbadata[0]->FBAID.'</p>';
$message .= '<p> Ticket ID :'.$fbadata[0]->TicketRequestId.'</p>';
$message .= '<p> Category :'.$fbadata[0]->CateName.'</p>';
$message .= '<p> SubCategory:'.$fbadata[0]->QuerType.'</p><br>Ticket Summary<br><br>Attachment:If any';
$message .= '</body></html>';


  $data=array("from"=>"finmartsupport@rupeeboss.com","to"=>$req->toemailid,"cc"=>$req->ccemailid,"bcc"=>"","content"=>$message ,"sub"=>"Ticket Request");
     

   $res = DB::table('TicketRequest')->where('TicketRequestId','=',$req->TicketRequestId)->update(['user_fba_id'=>$req->FBAUserId,'assigned_date'=>  date('Y-m-d H:i:s')]);

     $post_data=json_encode($data);
      //print_r($post_data); exit();
      $result=$this->call_json_data_api('http://horizon.policyboss.com:5000/quote/emailsendgrid',$post_data);
      //print_r($result);exit();
      $http_result=$result['http_result'];
      $error=$result['error'];
        $st=str_replace('"{', "{", $http_result);
        $s=str_replace('}"', "}", $st);
        $m=$s=str_replace('\\', "", $s);
        $update_user='';
        $obj = json_decode($m);

        // if($obj->d->status='Success'){
        //  $respon=($obj->d->lstPackParameter);
        // }else{
        // $respon=0;
        // }
         print_r($m); exit();
        }
        catch (Exception $e){
        return $e;    
           }    


 $error=''; 
try{
 if(isset($req->toemailid)){
 if($req->ccemailid){
 $this->mail_fn($req->toemailid,explode(',',$req->ccemailid),$req->TicketRequestId); 
  }
 else
  {
  $this->mail_fn($req->toemailid,[],$req->TicketRequestId); 
  }
  date_default_timezone_set("Asia/Kolkata");  
  $cuedate=date('Y-m-d H:i:s');

  //print_r($cuedate); exit();
   DB::table('TicketRequest')->where('TicketRequestId','=',$req->TicketRequestId)->update(['user_fba_id'=>$req->FBAUserId,'assigned_date'=> $cuedate]);
    $error=0;
    }
    }catch (Exception $e){
   $error=1;  
   }
   return $error;


 }


 

          // 
     //  print_r($post_data);exit();

public  function ticket_request_userlist(Request $req){   
$query=DB::select('call sp_ticket_request_assign(?)',[Session::get('fbauserid')]);
// $query=DB::select('call sp_ticket_request_assign()');
$status=DB::select('call sp_TicketStatus()');
return view('ticket.ticket_request_userlist',['query'=>$query,'status'=>$status]);
}
public function ticket_user_comment(Request $req){   
$error=''; 
try{
DB::table('Ticket_comment')->insert(['ticket_req_id'=>$req->TicketRequestId,'ticket_status_id'=>$req->status,'comment'=>$req->comment]);
$error=0; 
}catch (Exception $e)
{  $error=1;  }
return $error;
} 
public function mail_fn($email,$arrcc,$TicketRequestId){



 
$data=DB::select('call usp_get_ticket_mail_data(10)')[0]; 

 $mail = Mail::send('ticket/ricket_mail_view',['data' => $data], function($message) use($email,$arrcc) {


                $message->from('scriptdp@gmail.com', 'FinMart');
                $message->to($email);

                        if(isset($arrcc)){
                              foreach ($arrcc as $key => $cc) {
                                    $message->cc($cc);
                        }
                        }
                        
                 $message->subject('Ticket Request');  

                });
                     
 
          if(Mail::failures()){


                            return "false";
                    }else{
                            return "true";

                    }

 

}
public function getticketdetails(){ 
$ticketdetails=DB::select("call (usp_load_ticket_details)");
return view ('dashboard.ticket-module',['ticketdetails'=>$ticketdetails]);
}
}

