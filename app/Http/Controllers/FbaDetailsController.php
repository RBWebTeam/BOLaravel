<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
use Log;
use Mail;
use App\jobs\MailTest;
use Carbon\Carbon;
class FbaDetailsController extends TestController
{
       
       public function fba_details_update(Request $req){

          $aa=[1,23,];
       	// $this->dispatch((new MailTest($aa))->delay(now()->addSeconds(10)));
       	// $emailJob = (new MailTest($aa))->delay(Carbon::now()->addSeconds(30));
        // dispatch($emailJob);

 


        return view('fba-details-update');



       }


       public function fba_search_id(Request $req){

             
            try{
          
             $query=DB::select('call sp_fba_update_data(?)',[$req->fba_id]);
           return Response::json(['query'=>$query[0],'status' => true]);
      }catch (Exception $e){
               return Response::json(['status' => false]);

       }

          

       }
}
