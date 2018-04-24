<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 
use Session;
use Validator;
use Redirect;
use Mail;
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

                 foreach ($req->ccemailid as $key => $value) {
                  if(isset($value)){
                 $arr[]=$value;
             }
            }


print_r($req->example_emailSUI);



exit;
             $mail=$this->mail_fn($req->toemailid,$arr);
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
                   $query=DB::select('call sp_ticket_request_assign(1)');
    	

               
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

                $data ="Please ";
                $mail = Mail::send('ticket/ricket_mail_view',['data' => $data], function($message) use($email,$arrcc) {
                $message->from('scriptdp@gmail.com', 'FinMart');
                $message->to($email)
                        ->cc($arrcc)
                ->subject('Ticket Request');
                });
                     
                    //  dd(Mail::failures());

                    if(Mail::failures()){
                            return 1;
                    }else{
                            return 0;

                    }

    }
}
