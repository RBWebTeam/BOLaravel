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
class FsmRegisterController extends Controller
{
	/*public function getFSM(){
       return view('dashboard.FSMregister');
   }*/

public function getsate()
{
   $state = DB::select("call usp_load_state_list()");
   $manager = DB::select("call usp_load_managers()");

    return view('dashboard.FSMregister',['state'=>$state,'manager'=>$manager]);
}
public function getcity($id)
{
	$cities = DB::table("city_master")
                    ->where("stateid",$id)
                    ->pluck("cityname","city_id");
        return json_encode($cities);
      
}
 
 public function getpincode($flag,$value){
 	
 $pincode = DB::select("call usp_load_pincodes($flag,$value)");
  return json_encode($pincode);
}

public function insertfsm(Request $req){
  $validator =Validator::make($req->all(), [
             'FirstName' => 'required',
             'LastName' => 'required',
             'EmailId' =>'required',
             'MobileNo' => 'required',
             'Pincode' => 'required',
                            ]);
             if ($validator->fails()) {
             return redirect('Fsm-Register')
             ->withErrors($validator)
             ->withInput();
            }else{
          

    DB::statement('call sp_insert_FBAReg(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
      $req->txttitle,
      $req->FirstName,
      $req->LastName,
      $req->txtCname,
      $req->EmailId,
      $req->MobileNo,
      $req->txtdate,
      $req->txtpan,
      $req->txtAadhar,
      $req->Pincode,
      $req->txtCity,
      $req->txtstate,
      $req->txtmanager,
      $req->rdo,
      $req->txtfsmtype,
      $req->txtbankacno,
      $req->txtactype,
      $req->txtifsc,
      $req->txtmicr,
      $req->txtbankname,
      $req->txtbankbrach,
      $req->txtbankcity
    ));
      
    Session::flash('message', 'Register successfully...!'); 
        return redirect('Fsm-Register');
  }
}
}

/*1,shubham,khandekar,rupeeboss,shubhamkhandekar2@gmail.com,7218150396,02-15-2018,on,,abcd1234,490380602929,400708,mumbai,1,1000016,Employee,18,163,123456789,2,12345,12345,kotak,mumbai,mumbai*/