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
class bankofferController extends InitialController
{
       
        public function bank_offer (){

       $query=DB::select("call usp_load_cities1()");
       $state=DB::select("call usp_load_state_list()");
       $pincode=DB::select("call usp_load_pincode1()");
       // $pincode=DB::select("call usp_load_pincodes(3,".'pincode'.")");

       


        return view('dashboard.bankoffer',['query'=>$query,'state'=>$state,'pincode'=>$pincode]);
  
}

    ////******state_dropdown*****////

        public function droup_state()

       {
          $users=DB::select("call usp_load_states()");
           return view('state-dropdown',['users'=>$users]); 
        }

        public function state_demo(Request $req) // submit data in database
       {

        
     // print_r($req->all());
     //  DB::table('city_alias')->insert([
     //     ['city_id' =>$req->city_id,
     //  'sub_city_name' => $req->s_name],
     //  ]);
      DB::statement("call usp_save_city_mappingdata(?,?)",array($req->city_id,$req->s_name));
      Session::flash('message', 'City saved successfully');
      return Redirect('state_dropdown');
         // $users=DB::select("call usp_load_states()");
         // return view ('state-dropdown',['users'=>$users]); 
    }


        public function get_cities($cityid)

        {
           $cities = DB::table("city_master")
                    ->where("city_id",$cityid)->get();
           return json_encode($cities);

        }


        public function get_sub_cities($cityid)

         {

          $subcities = DB::table("city_alias")
                    ->where("city_id",$cityid)->get();
           return json_encode($subcities);
 
       }



       //****city_dropdown****
      public function droup_city ()
        {
          $users=DB::select("call usp_load_states()");
           return view('city-dropdown',['users'=>$users]); 
        }


      public function get_state_id($cityid)

       {
            $state_id = DB::select("call get_city_subcity(?)",array($cityid));
           return response()->json($state_id);
    
       }

}
