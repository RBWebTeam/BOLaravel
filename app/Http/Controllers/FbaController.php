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
class FbaController extends InitialController
{
       
        public function fba_list(){


                $query=DB::select("call usp_load_fbalist_new(0)");
                /*print_r($query); exit();*/

                 return view('dashboard.fba-list',['query'=>$query]);

        }

}

