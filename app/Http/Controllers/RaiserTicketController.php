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
class RaiserTicketController extends Controller
{
	public function getraiserticket(){
    $cat = DB::select("call Usp_getraisertktcat()");
	 return view('dashboard.RaiserTicket',['cat'=>$cat]);

	}

	public function getsubcat($CateCode){

		 $subcat = DB::select("call Usp_getraisertktsubcat($CateCode)");
		   return json_encode($subcat);
	}
	public function getclassi($QuerID){
		
		 $classi = DB::select("call Usp_getraiseClassification($QuerID)");
		   return json_encode($classi);
	}

  public function gettoccmail($Querid){
    
     $toccmail = DB::select("call Usp_gettoccmailraisetkt($Querid)");
       return json_encode($toccmail);
  }

	public function inserraisertkt(Request $req){

		$id=Session::get('fbauserid');
		$validator =Validator::make($req->all(), [
              'txtraisermessage' =>'required',
                                  ]);
             if ($validator->fails()) {
             return redirect('RaiseaTicket')
             ->withErrors($validator)
             ->withInput();
            }else{
          
	   $image = $req->file('pathimgraiser');
	   $name ="";
	   if($image){
	   	 $name = time().'.'.$image->getClientOriginalName();
       $destinationPath = public_path('upload/Raiserticket/'); //->save image folder 
       $image->move($destinationPath, $name);
	   }
      
		 $lastid=DB::select('call Usp_inserraisertkt(?,?,?,?,?,?,?,?,?,?)',array(
		 	$req->ddlCategory,
		 	$req->ddlsubcat,
		 	$req->ddlClassification,
		 	$name,
		 	$req->txtraisermessage,
		 	$req->txtfbaid,
		 	"",
		 	"",
		 	"BO",
            $id
		 ));
             
//           $data ="You have been assigned a ticket from";
              
//                 $email = $req->txttoemailid;
//                 $ccemail=$req->txtccemailid;

//                 $string = $ccemail;

//                 $cc  = explode(",", $string);

//                 //print_r($array);exit();

                

/*if($ccemail!=''){

// if($ccemail!=''){

                
//                 $mail = Mail::send('mailViews.SendTicketReqMailFormat',['data' => $data,
//                 	'lastid'=>$lastid],
//                    function($message)use($email,$cc){
//                 $message->from('wecare@rupeeboss.com', 'Finmart ');
//                 $message->to($email)->cc($cc)->subject('Ticket Request');
//                 });
             
//                     if(Mail::failures()){
//                             $error=3;
//                             echo $error;
//                     }else{

                    
//                     }
//                 }
// else{
// 	$mail = Mail::send('mailViews.SendTicketReqMailFormat',['data' => $data,
//                 	'lastid'=>$lastid], function($message)use($email){
//                 $message->from('wecare@rupeeboss.com', 'RupeeBoss');
//                 $message->to($email)->subject('Ticket Request');
//                 });
              
//                     if(Mail::failures()){
//                             $error=3;
//                             echo $error;
//                     }else{

//                     }


    }*/

//     }
     Session::flash('message', 'Ticket created successfully. Your ticket no is '.$lastid[0]->TicketRequestId); 



      return redirect('RaiseaTicket');
 }
 }
}