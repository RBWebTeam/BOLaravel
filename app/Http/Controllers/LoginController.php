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
      public function login(Request $request){
         
     $validator = Validator::make($request->all(), [
    'email' => 'required',
    'password' => 'required',
    ]);

   if ($validator->fails()) {
    return redirect('/')
    ->withErrors($validator)
    ->withInput();
   }else{
          



           $query=DB::select('call sp_user_login(?,?,?)',array($request->email,$request->password,$request->ip()));
           

           if($query){
            $val=$query[0];
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
                    


 
 
       

                 
              return redirect()->intended('dashboard');
        }else{
                      Session::flash('msg', "Invalid esmail or password. Please Try again! ");
                       return Redirect::back();
               
 }


           // $value=DB::table('emp_login')->where('emailid','=',$request->email)
           // ->where('password','=', $request->password)
          // ->first();
          // 	if($value!=''){ 
		        //   	  $request->session()->put('emailid',$value->emailid);
		        //   	  $request->session()->put('emptype',$value->emptype);
		        //       $request->session()->put('emp_id',$value->emp_id);
		        //       $request->session()->put('username',$value->username);
          //         $request->session()->put('last_login',$value->last_login);
		              
		             
          //        return redirect()->intended('dashboard');
          //       }else{
          //      	      Session::flash('msg', "Invalid email or password. Please Try again! ");
          //              return Redirect::back();
               	  
          //    }



           }

       }

        //         public function register_user() {

        //         return view('register-user');
        // }

             // start insert
        public function registerinsert (Request $req){ 
          // DB::statement("call usp_insert_emp_login_new(?,?,?,?)",array($req->username,$req->Emailid,$req->password,$req->employetype));
           // DB::statement("call usp_insloginstatemapping(?,?)",array($req->username,$req->txtstate));
         

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
 


       DB::table('FBAUsers')->insert(
       [ 'UserName' =>$req->UserName,
       'email' =>$req->email,
      'mobile' =>$req->mobile,
       'companyid' =>$req->company_id,
        'reportingid' =>$req->reporting_id,
         'stateid' =>$req->state_id,
          'cityid' =>$req->city_id,
           'user_id' =>Session::get('fbauserid'),
           'user_type_id' =>$req->user_type,
            'usergroup' =>$req->menu_group,
             'uid' =>$req->uid,
             'password' =>$req->password]);

    Session::flash('message', 'Register successfully...!'); 
   }

    
           return redirect ('register-user');
 

}




public function register_update(Request $req){

             // $query=DB::table('FBAUsers')->where('fbauserid','=',$req->id)->first();
                 $query=DB::select("call sp_fba_update(?)",[$req->id]);

 
                  $state = DB::select("call usp_load_state_list()");
                  $user_type=DB::table('user_type_master')->get();
                  $menu_group=DB::table('menu_group_master')->get();
                  $city=DB::table('CityStateList')->select('DCCityID','CityName')->get();
                  
                return view('register-update',['state' => $state,'user_type'=>$user_type,'menu_group'=>$menu_group,'city'=>$city,'query'=>$query[0]]);

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
           'user_type_id' =>$req->user_type,
            'usergroup' =>$req->menu_group,
             'uid' =>$req->uid,
             'password' =>$req->password]);

    Session::flash('message', 'Register successfully Update...!'); 
   }

 return redirect ('register-user');
}

public function logout(Request $req) {
  $req->session()->flush();
   return redirect('/');
}




 //                public function register_form(Request $req){
 //                 $val =Validator::make($req->all(), [
 //                'name' => 'required|min:5',
 //                'contact' => 'required|regex:/^[0-9]{10}+$/',
 //                'email' => 'required|email|unique:user_registration',
 //                'password' =>'required|min:6',
 //                'confirm_password' => 'required|min:6|same:password',
 //                            ]);

 //           if ($val->fails()){

 //              return response()->json($val->messages(), 200);
 //           }else{


 //             $query=new registrationModel();
 //                  $query->username=$req->name;
 //                  $query->email=$req->email;
 //                  $query->contact=$req->contact;
 //                  $query->password=md5($req->password);
 //                  $query->provider_user_id=0;
 //                  $query->provider=0;
 //                  $query->created_at=date('Y-m-d H:i:s');

 //               if($query->save()) {
 //                  $req->session()->put('email',$query->email);
 //                  $req->session()->put('contact',$query->contact);
 //                  $req->session()->put('user_id',$query->id);
 //                  $req->session()->put('name',$query->username);
 //                  $req->session()->put('is_login',1);
 //                  DB::table('customer_details')->insert(['user_id' =>$query->id]);

 //                  $error="1";
 //                  echo $error;
 //        }
 //     }
 // }
 //      //added by manish to logout
 //        public function logout(Request $req){
 //          $req->session()->flush();

 //   // google logout function 
    
 //          return redirect('/');
 //        }



 //        public function forgot_password(Request $req){
 //             $query=new registrationModel();
 //              $val =Validator::make($req->all(), [
 //                'email' => 'required|email',
 //                            ]);
 //           if ($val->fails()){
 //              return response()->json($val->messages(), 200);
 //           }else{
 //              $value=$query->where('email','=',$req->email)
 //              ->first();
 //              if($value!=''){
                           
 //                    $password = mt_rand(100000, 999999);
 //                $data ="Please use ".$password." as password to login for ur email ".$req->email."";
 //                $email = $req->email;
 //                $mail = Mail::send('email_view',['data' => $data], function($message) use($email) {
 //                $message->from('wecare@rupeeboss.com', 'RupeeBoss');
 //                $message->to($email)
 //                ->subject('Your New Password');
 //                });
 //                    print_r($mail);
 //                    if(Mail::failures()){
 //                            $error=3;
 //                            echo $error;
 //                    }else{

 //                    $query=DB::table('user_registration')
 //                              ->where('email', $req->email)
 //                              ->update(['password' => md5($password)]);
 //                            $error=2;
 //                            echo $error;
 //                    }
                       
 //                       // $error=2;
 //                       //       echo $error;
 //                 }else{
                  
 //                    $error=1;
 //                    echo $error;
 //                 }

 //                }
 //        }

 

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




}
