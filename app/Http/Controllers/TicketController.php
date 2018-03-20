<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 
use Session;
use Validator;
use Redirect;

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
           $error=''; 
            try{
        	DB::table('TicketRequest')->where('TicketRequestId','=',$req->TicketRequestId)->update(['user_fba_id'=>$req->FBAUserId]);
                        $error=0; 
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
}
