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
class SendNotificationController extends InitialController
{
       
        public function sendnotification(){


              //  $query=DB::select("call usp_load_fbalist_new(0)");
                /*print_r($query); exit();*/

                 return view('dashboard.sendnotification');

        }

}

