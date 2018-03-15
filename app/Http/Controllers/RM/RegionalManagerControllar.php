<?php

namespace App\Http\Controllers\RM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Validator;
use Redirect;
class RegionalManagerControllar extends Controller
{
      public function regional_manager(Request $req){
            
            
                 $query=DB::select('call get_rmid_data(?)',[0]);
                 
           // $fbamaster=DB::table('FBAMast')->where('rm_id','=',0)->get();
      	    return view('rm',['fbamaster'=>$query]);


      }


      public function Regional_Manager_search(Request $req){
        $query=DB::select('call get_details_rmid(?,?,?,?)',[$req->product_type,$req->ms_type,$req->p_rm_id,$req->p_fba_id]);

 
     
     return view('vehiclerequest',['query'=>$query]);


      }
}
