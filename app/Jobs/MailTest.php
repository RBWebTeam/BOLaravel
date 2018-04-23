<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Log;
use Mail;
class MailTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $date;
    public function __construct($data)
    {
          $this->date=$data;
 

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       // Log::info("Request cycle without Queues started");
        Mail::send('ticket/ricket_mail_view', ['data'=>$this->date], function ($message) {

            $message->from('rajbhardp@gmail.com', 'Christian Nwmaba');

            $message->to('scriptdp@gmail.com');

        });
       // Log::info("Request cycle without Queues finished");
    }
}
