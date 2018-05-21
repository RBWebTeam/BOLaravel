<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use DB;
class Ticket_mail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */


     protected $email;
     protected $arrcc;
     protected $reqid;
    public function __construct($email,$arrcc,$TicketRequestId)
    {
            $this->email=$email;
            $this->arrcc=$arrcc;
            $this->reqid=$TicketRequestId;

             
    }

    /**
     * Execute the job.
     *
     * @return void
     */



    public function handle()
    {
                    $email=$this->email;
                    $arrcc=$this->arrcc;
        
                
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
}
