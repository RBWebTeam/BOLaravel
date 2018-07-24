<?php

namespace App\Http\Controllers\crm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Response;
class MyfollowupController extends Controller
{
     public function my_followup(Request $req){
               

               $query=DB::select('call sp_crm_myfollowup(?)',[Session::get('UId')]);

               
              
            return view('crm.my_followup',['query'=>$query]);

     }

     public function assign_followup(Request $req){
               

            $query=DB::select('call sp_crm_assign(?)',[Session::get('UId')]);

               
              
            return view('crm.assign_followup',['query'=>$query]);

     }


}
