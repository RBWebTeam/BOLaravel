<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
//use Validator;
use Redirect;
use Session;
use URL;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class LoginController extends InitialController
{
public function checklogin(Request $request){
if(!$request->session()->exists('emailid')){
return view('index');
}else{
return redirect('/dashboard');
}
}
public function login(Request $request){
$validator = Validator::make($request->all(), [
'email' => 'required|max:100',
'password' => 'required|max:100',
 ]);
 if ($validator->fails()) {
  return redirect('/')
  ->withErrors($validator)
 ->withInput();
   }else{
          
$query=DB::select('call sp_user_login(?,?,?)',array($request->email,$request->password,$request->ip()));
  if($query){
  $val=$query[0];
  $request->session()->flush();
  $request->session()->put('emailid',$val->email);
 $request->session()->put('emailid',$val->email);
 $request->session()->put('fbauserid',$val->fbauserid);
 $request->session()->put('fbaid',$val->fbaid);
                    $request->session()->put('username',$val->username);
                    $request->session()->put('loginame',$val->loginame);
                    $request->session()->put('uid',$val->uid);
                    $request->session()->put('mobile',$val->mobile); 
                    $request->session()->put('empid',$val->empid);
                    $request->session()->put('usergroup',$val->usergroup);
                    $request->session()->put('companyid',$val->companyid);
                    $request->session()->put('last_login',$val->last_login);
  

       $qu=DB::table('finmartemployeemaster')->select('fba_id','UId')
       ->where('fba_id','=',$val->fbaid)->first();

 
       if($qu){
           $request->session()->put('UId',$qu->UId);
       } 


                
                    // 110318  109996

                    // $request->session()->put('LastLogiDate',$val->LastLogiDate);                              
               return redirect()->intended('dashboard');
          }else{
                      Session::flash('msg', "Invalid email or password. Please Try again! ");

                    
              return redirect()->intended('dashboard');
       }
        {
 Session::flash('msg', "Invalid esmail or password. Please Try again! ");
  return Redirect::back();              
 }
 }
 }
 // start insert
        public function registerinsert (Request $req){ 
         

           return redirect ('register-user');

          }
                 
                 public function register_user(){
                  $state = DB::select("call usp_load_state_list()");
                  $user_type=DB::table('user_type_master')->get();
                  $menu_group=DB::table('menu_group_master')->get();
                  $city=DB::table('CityStateList')->select('DCCityID','CityName')->get();
                  
                return view('register-user',['state' => $state,'user_type'=>$user_type,'menu_group'=>$menu_group,'city'=>$city]);
                }

           public function register_user_save(Request $req){  



  
           $validator =Validator::make($req->all(), [
             
               'UserName' => 'required|string|max:20|unique:FBAUsers',
              'email' => 'required|string|email|max:255|unique:FBAUsers',
              'mobile' => 'required',
              'company_id' =>'required|not_in:0',
              'reporting_id' =>'required|not_in:0',
              //'state_id' =>'required|not_in:0',
             // 'city_id' =>'required|not_in:0',
              //'user_type' =>'required|not_in:0',
              'menu_group' =>'required|not_in:0',
             'password' =>'required|min:6',
             'cpassword' => 'required|min:6|same:password',
                            ]);
             if ($validator->fails()) {
             return redirect('register-user')
             ->withErrors($validator)
             ->withInput();
            }else{
 


       DB::table('FBAUsers')->insert(
       [    'UserName' =>$req->UserName,
            'email' =>$req->email,
            'mobile' =>$req->mobile,
            'companyid' =>$req->company_id,
            'reportingid' =>$req->reporting_id,
            'stateid' =>$req->state_id,
            'cityid' =>$req->city_id,
            'user_id' =>Session::get('fbauserid'),
           // 'user_type_id' =>1,
            'usergroup' =>$req->menu_group,
            'uid' =>$req->uid,
            'password' =>$req->password]);

       
Session::flash('message', 'User Register successfully...!'); 
   }

    
           return redirect ('register-user');
 

}

public function register_update(Request $req){  

             // $query=DB::table('FBAUsers')->where('fbauserid','=',$req->id)->first();
                 $query=DB::select("call sp_fba_update(?)",[$req->id]);
 
                  $state = DB::select("call usp_load_state_list()");
                  $user_type=DB::table('user_type_master')->get();
                  $menu_group=DB::table('menu_group_master')->get();
                //  $city=DB::table('CityStateList')->select('DCCityID','CityName')->get();
                  
                return view('register-update',['state' => $state,'user_type'=>$user_type,'menu_group'=>$menu_group,'query'=>$query[0]]);

}


public function register_user_update(Request $req){


           $validator =Validator::make($req->all(), [
             
              //  'UserName' => 'required|string|max:20|unique:FBAUsers',
              // 'email' => 'required|string|email|max:255|unique:FBAUsers',
              'mobile' => 'required',
              'company_id' =>'required|not_in:0',
              'reporting_id' =>'required|not_in:0',
              // 'state_id' =>'required|not_in:0',
              // 'city_id' =>'required|not_in:0',
              'user_type' =>'required|not_in:0',
              'menu_group' =>'required|not_in:0',
             'password' =>'required|min:6',
             'cpassword' => 'required|min:6|same:password',
                            ]);
             if ($validator->fails()) {
             return redirect('register-user')
             ->withErrors($validator)
             ->withInput();
            }else{
 
        DB::table('FBAUsers')->where('FBAUserId','=',$req->FBAUserId)->update(
        [ 'UserName' =>$req->UserName,
        'email' =>$req->email,
       'mobile' =>$req->mobile,
        'companyid' =>$req->company_id,
        'reportingid' =>$req->reporting_id,
         'stateid' =>$req->state_id,
          'cityid' =>$req->city_id,
           'user_id' =>Session::get('fbauserid'),
           'user_type_id' =>1,
            'usergroup' =>$req->menu_group,
             'uid' =>$req->uid,
             'password' =>$req->password]);
          Session::flash('message', 'Register successfully Update...!'); 
          }
        return redirect ('register-user-list');
        }


public function register_user_list(){

  $query = DB::select("call sp_register_user_list()");

//$query=DB::table('FBAUsers')->select('UserName','email','mobile','')->where('user_type_id','=',1)->get();
  return view('register-user-list',['query'=>$query]);
  }
  public function logout(Request $req) {
  $req->session()->flush();
   return redirect('/');
    }
   public function search_state(){

 // $term = Input::get('term');
 // $products=DB::table('state_master')->select('state','state_id')
 // ->get();

 
 $products = DB::select("call usp_load_state_list()");
        
 $data=array();
 foreach ($products as $product) {
  $data[]=array('value'=>$product->state_name,'datavalue'=>$product->state_id);
}
if(count($data)){
           //    print_r($data);
 return $data;
}
else
  return ['value'=>'No Result Found'];
}


public function search_city(Request $req){

 
   $term = $req->fstate_id; 


 $products=DB::table('CityStateList')->select('CityName','DCCityID','StatID')
 ->where('StatID',$term)->distinct()
 ->orderBy('CityName', 'asc')
 ->get();


 // $term = Input::get('fstate_id');
 // $products=DB::table('districtwise_zone_master')->select('district_name','district_id')
 // ->where('state_id',$term)
 // ->get();
 
 $data=array();
 foreach ($products as $product) {
  $data[]=array('value'=>$product->CityName,'datavalue'=>$product->DCCityID);
}
if(count($data)){
           //    print_r($data);
 return $data;
}
else
  return ['value'=>'No Result Found'];
}




public function went_wrong(Request $req){

            return view('500');
}

}
