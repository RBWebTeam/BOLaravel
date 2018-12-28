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
use Excel;
class finmart_offline_requestController extends CallApiController 
{

	public function display_offline_request(){
     //$fbaid=Session::get('fbaid');
      
	 $Quotes = DB::select("call usp_get_offline_quotes()");
    //$Quotes = DB::select("call usp_get_offline_quotes_with_restriction($fbaid)");   
         //print_r($Quotes); exit();
   
       return view('finmart_offline_request',['Quotes'=>$Quotes]); 
	
   }

   		public function insert_offline_status(Request $req){			        	
		  //print_r($req->all()); exit();
		DB::select('call usp_update_status_details(?,?,?)',array(
	    $req->hiddenid,		
		  $req->ddltype,  
   	 	$req->statuscomment,  
));
      //  Session::flash('message', 'Record has been saved successfully');
      //return Redirect::back(); 
	      //return redirect('finmart_offline_request');
        
}
			
// Update amount and Date
		public function updte_offline_amt_date(Request $req){	
		//print_r($req->all()); exit();		        	
		DB::select('call usp_update_amt_date(?,?,?,?)',array(
		$req->hiddenidamt,	
		$req->Amount,
    $req->ddltype,  
	  $req->convertdate,  
   	 	  
));

	  //return redirect('finmart_offline_request');
}
public function insertoflinedoc(Request $req){ 

	//print_r($req->all());exit();

	         //$Docupload1=$this->fileupload_fn($req->file('Docupload1'));
           //$Docupload2=$this->fileupload_fn($req->file('Docupload2'));
           //$Docupload3=$this->fileupload_fn($req->file('Docupload3'));
           //$Docupload4=$this->fileupload_fn($req->file('Docupload4'));
   			
    //	print_r($Docupload1);exit();
   		/*	DB::select('call usp_update_doc_path(?,?,?)',array(
   			   $req->hidedenquote,
           $req->p_doc_type,	
		       $Docupload1,
		       //$Docupload2,
		       //$Docupload3,
		       //$Docupload4   	 	  
));*/
       // print_r($_FILES);
       // print_r($req->all());
        //exit;
        foreach($_FILES as $doc_name =>  $value_array){
          if(!empty($value_array['name'])){
            $doc_path = $this->fileupload_fn($req->file($doc_name));
             $dname = DB::select("call get_document_name()"); 
            DB::select('call usp_update_doc_path(?,?,?)',array($req->hidedenquote,$doc_path,$doc_name));
          } 
        }

        Session::flash('message', 'Document Uploded successfully');
   			return redirect('offline-request');
}


      public function fileupload_fn($image){
         // print_r($image);
        // print_r($_FILES);
        // exit;
  
            $declva='';
            if($image!=''){
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('upload/offlinedocs/'); //->save image folder 
            $image->move($destinationPath, $name);
            $declva=$name;
           }else
           {
              $declva='0';
           } 
             
             return $declva;
  }

 //public function getdocoffline($id,$type){
    public function getdocoffline($id){ 
      $Response_array = [];
    //print_r($req->all()); exit();  
     $viewimg= DB::select('call get_offline_doc(?)',array($id));
//print_r($viewimg);exit();

 foreach($viewimg as $val ){
    $Response_array[$val -> quotes_request_id][$val -> Doc_type] = $val -> document_path;
    $Response_array[$val -> quotes_request_id]['Type'] = $val -> Type;
  }
  
    return json_encode($Response_array);
     //return json_encode($viewimg);
}


        public function getcurrentstatus($id){
    //print_r($req->all()); exit();  
            $data=[];
          $data= DB::select('call get_offline_current_status(?)',array($id));
          return json_encode($data);
           //return view('offline-request',['data'=>$data]); 
        }


    public function getdocofflineone($id){ 
      $Response_array = [];
    //print_r($req->all()); exit(); 
     $viewimgone= DB::select('call get_offline_doc_one (?)',array($id)); 
     
//print_r($viewimgone);exit();

foreach($viewimgone as $val ){
    $Response_array[$val -> quotes_request_id][$val -> Doc_type] = $val -> document_path;
    $Response_array[$val -> quotes_request_id]['Type'] = $val -> Type;
  }

  return json_encode($Response_array);
}


        public function getquotediscription($id){
        $quotedisc= DB::select('call get_quote_description(?)',array($id));
         return json_encode($quotedisc);
           return view('offline-request',['data'=>$data]); 
        }

      public function insert_offline_remark(Request $req){

    //print_r($req->all()); exit();
   DB::select('call usp_update_offline_remark(?,?,?)',array(
      $req->hiddenidremark,   
      $req->rmkupdte,
      session::get('fbaid'),  
      
));
    
       //return redirect('finmart_offline_request');
        
}


    public function getofflineremark($quote_request_id){
//print_r($quote_request_id);exit();
            //$data=[];
          $data= DB::select('call get_offline_remark(?)',array($quote_request_id));
          return json_encode($data);
           //return view('offline-request',['data'=>$data]); 
        }




}