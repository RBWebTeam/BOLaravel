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
class rmcitymappingController extends Controller
{
	public function rmcitymapping(){
		

		return view('dashboard.rm_city_master');

      }

      public function getrm (){

              $query=DB::table('rm_master')->select('name','id','city_id')->get();
              $state = DB::select("call usp_load_state_list()");
            return view ('dashboard.rm_city_master',['query'=>$query,'state'=>$state]);
            }

             public function getstatecity(Request $req){
              print_r($req->all());exit();

             $state=DB::select("call getStateCityForRMCityMapping(?)");
            return view ('dashboard.rm_city_master',['state'=>$state]);
            }

           

 public function getcity($state_id)
{
	// $cities = DB::table("city_master")
 //                    ->where("stateid",$state_id)
 //                    ->pluck("cityname","city_id");
 //        return json_encode($cities);

        $cities = DB::table("city_master")
                    ->whereIn("stateid", explode(",",$state_id))
                    ->pluck("cityname","city_id");
                    return json_encode($cities);

           }

             public function rmcityinsert (Request $req){
     		 // print_r($req->all()); exit();
     		$data = implode(',',$req->ddlcity);
     		$arra= array('assigncity_id'=>$data);
		  	$que=DB::table('rm_master')->where('id','=',$req->rmname)->update ($arra);
     		 // echo $data;exit();
            return redirect('rm_city_master');
             
             }
           
           //    public function getcitystateid(){

           //    $query1=DB::select("call getStateCityForRMCityMapping(?)");

           //    return view('dashboard.rm_city_master',['query1'=>$query1]);
             
           // }

           
       }
