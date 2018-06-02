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
class quickleadController extends CallApiController
{
          public function showlead (){

            $fbascity = DB::select('call getquick_city_state(0,0)'); 
            $userfb=DB::select("call get_fba_fbauser()"); 

          return view('quick_lead_assignment',['fbascity'=>$fbascity,'userfb'=>$userfb]);
 }

          public function quicklead(){
          $state = DB::select("call usp_load_state_list()");
          echo json_encode($state);
 }

          public function quickleadcity(Request $req){
          $city = DB::select('call usp_city_master(?)',array($req->state));
          return $city;
 }  

          public function statecityfba (Request $req){

         $fbascity = DB::select('call getquick_city_state(?,?)',[implode(',',$req->state),implode(',',$req->city)]);

       // $userfb=DB::select("call get_fba_fbauser()"); 
 
    return json_encode($fbascity);
 
        //  return view ('quick_lead_assignment',['fbascity'=>$fbascity,'userfb'=>$userfb]);
 }

      public function Insertquicklead(Request $req){

               $id=Session::get('fbauserid');
               $fbatotal = explode(",",  $req->txtfid);
                $fid = "";
               for ($i=0; $i < count($fbatotal); $i++) { 
                    if($i%50==0){              
                         $fid=$fid.','.$fbatotal[$i];
                         $fid = ltrim($fid, ',');
                           DB::statement('call sp_quickleaduserfbamapping(?,?,?)',array(
                               $fid,
                               $req->ddlstatus,              
                               $id
                           ));
                         $fid = "";
                    }
                    else{        
                         $fid=$fid.','.$fbatotal[$i];
                    }
               }

               if($fid!=""){    
                    $fid = ltrim($fid, ',');
                     DB::statement('call sp_quickleaduserfbamapping(?,?,?)',array(
                               $fid,
                               $req->ddlstatus,              
                               $id
                           ));
               }
       return "successfully";   
        
  }




 }