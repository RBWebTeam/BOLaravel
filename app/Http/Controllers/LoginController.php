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
          

           $query=DB::select('call spValidateLogin(?,?,?,?,?,?)',array($request->email,$request->password,'0','0','0','0'));
           $val=$query[0];

         
           
         if($val->SuccessStatus==1){  
                   $request->session()->flush();
                   $request->session()->put('emailid',$val->CustID);

                   $request->session()->put('emp_id',$val->CustID); 
                   $request->session()->put('FullName',$val->FullName); 
                  $request->session()->put('LastloginDate',$val->LastloginDate); 
                
                   // Session::put('username',$query->username);
                   // Session::put('last_login',$query->last_login);

                   $request->session()->put('emp_id',$val->CustID);
                   //Session::put('FullName',$query->FullName);
                   //Session::put('LastloginDate',$query->LastloginDate);


                 
              return redirect()->intended('dashboard');
        }else{
                      Session::flash('msg', "Invalid email or password. Please Try again! ");
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

                public function register_user(){

                return view('register-user');
        }

             // start insert
        public function registerinsert (Request $req){ 
          // DB::statement("call usp_insert_emp_login_new(?,?,?,?)",array($req->username,$req->Emailid,$req->password,$req->employetype));
           // DB::statement("call usp_insloginstatemapping(?,?)",array($req->username,$req->txtstate));
         

           return redirect ('register-user');

          }
                 
                 public function getsate(){

                 $query = DB::select("call usp_load_state_list()");
                  $AUTHORITIES =DB::select("call usp_load_authorities()");
             /*  print_r($query);
             exit();*/
                return view('register-user',['query' => $query,'AUTHORITIES'=>$AUTHORITIES]);
                }

           public function register_user_save(Request $req){

           $validator =Validator::make($req->all(), [
             'username' => 'required|min:5',
             'Emailid' => 'required|email|unique:emp_login',
             'password' =>'required|min:6',
             'confirm_password' => 'required|min:6|same:password',
                            ]);
             if ($validator->fails()) {
             return redirect('register-user')
             ->withErrors($validator)
             ->withInput();
            }else{
          
         $qu=DB::select("call usp_insert_emp_login_new(?,?,?,?)",array($req->username,$req->Emailid,$req->password,$req->employetype));

         // if($qu[0]->Result=='already'){
         //      Session::flash('message', 'Emailid already exists...!'); 
         // }else{
       
           $atho=implode(',',$req->author);
           $txtstate=implode(',',$req->txtstate);
           $proc= DB::select("call usp_usermenustatemapping(?,?,?)",array($qu[0]->Result,$atho,$txtstate)); 

           Session::flash('message', 'Register successfully...!'); 
        // }
         
           return redirect ('register-user');
}

}

public function logout(Request $req) 
{
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

 

}
