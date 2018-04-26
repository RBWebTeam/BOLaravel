<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 
use Session;
use Validator;
use Redirect;
use Mail;
use App\Jobs\Ticket_mail;
use Carbon\Carbon;
use Exception;
class TicketController extends Controller
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
           $arr=array();
           $error=''; 
 
            try{
                
              if(isset($req->toemailid)){
                 $mail=$this->mail_fn($req->toemailid,$req->ccemailid); }
 
             if($mail==0){
        	DB::table('TicketRequest')->where('TicketRequestId','=',$req->TicketRequestId)->update(['user_fba_id'=>$req->FBAUserId]);
            
                        $error=0; 
                 }else{
                    $error=1; 
                 }

                }catch (Exception $e){  $error=1;  }

         return $error;

    }


    public  function ticket_request_userlist(Request $req){   
                 //$query=DB::select('call sp_ticket_request_assign(?)',[Session::get('fbauserid')]);

                   $query=DB::select('call sp_ticket_request_assign()');
    	

               
                 $status=DB::select('call sp_TicketStatus()');
               return view('ticket.ticket_request_userlist',['query'=>$query,'status'=>$status]);

    }


    public function ticket_user_comment(Request $req){   
             $error=''; 
            try{
    	   DB::table('Ticket_comment')->insert(['ticket_req_id'=>$req->TicketRequestId,'ticket_status_id'=>$req->status,'comment'=>$req->comment]);

    	            $error=0; 
                        }catch (Exception $e){  $error=1;  }

                        return $error;
   



    }



    public function mail_fn($email,$arrcc){

 

   return $emailJob = (new Ticket_mail($email,$arrcc))->delay(Carbon::now()->addSeconds(30));
  

 
  
 
       
    }



public function getticketdetails(){ 
   $ticketdetails=DB::select("call usp_load_ticket_details()");
   return view ('dashboard.ticket-module',['ticketdetails'=>$ticketdetails]);
   }
   
}
