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
use Excel;
class nonfbaController extends CallApiController
{


      public function nonfbalist(){
// data load
          $query = DB::select("call non_fba_fbaList(0)");   
          return json_encode(["data"=>$query]);     
        }

      public function getnonfba(){
  // page load
          return view('dashboard.non_fba_list');
        }
}




