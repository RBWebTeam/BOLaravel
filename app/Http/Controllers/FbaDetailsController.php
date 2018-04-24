<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;
use Log;
use Mail;
use App\jobs\MailTest;
use Carbon\Carbon;
use Exception;
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
          
             $query=DB::select('call sp_fba_find_data(?)',[$req->fba_id]);

           return Response::json(['query'=>$query,'status' => true]);
      }catch (Exception $e){
               return Response::json(['status' => false]);

       }

          

       }

 

       public function fba_search_update(Request $req){
          try{
         DB::select('call sp_fba_update_data(?,?,?,?,?,?,?,?)',[$req->FBAID,$req->UserName,$req->FirsName,$req->MiddName,
                                                               $req->LastName,$req->FullName,$req->EmailID,$req->MobiNumb1]);
          return Response::json(['status' => true]);
          }catch (Exception $e){
               return Response::json(['status' => false]);

       }

       }
}
