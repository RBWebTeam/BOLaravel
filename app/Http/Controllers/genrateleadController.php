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
class genrateleadController extends Controller
{
 /* public function getlead()
  {
       return view('dashboard.genratelead');
   }*/

   public function getlead()
{
   $state = DB::select("call usp_load_state_list()");
   

    return view('dashboard.genratelead',['state'=>$state]);
}
}	