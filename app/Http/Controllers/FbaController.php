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
class FbaController extends CallApiController
{
      
        public function fba_list()
        {
           
         $doctype = DB::select("call get_document_type()");        
          return view('dashboard.fba-list',['doctype'=>$doctype]);         
        }
        public function get_fba_list(Request $req){
          try{
                
                if(isset($req->fdate) && isset($req->todate)){
               $data=array("FromDate"=>$req->fdate,"ToDate"=>$req->todate);


           }else{
                 $data=array("FromDate"=>Date('m-d-Y', strtotime("-28 days")),"ToDate"=>Date('m-d-Y'));
                 //$data=array("FromDate"=>"01-02-2018","ToDate"=>"01-28-2018");
           }
          $query=DB::select("call fbaList(0)");
          }catch (Exception $e){

    return $e;    
     }


          return json_encode(["data"=>$query]);
        }

        public function updateposp($fbaid,$value,$flag) {

          DB::select("call usp_update_posploanid('$fbaid','$value','$flag')");
          return redirect('fba-list');
        }
        public function sendsms(Request $req) {

              $newsms = utf8_encode(htmlspecialchars($req->sms, ENT_QUOTES));//htmlspecialchars();

              
              $post_data="";
              $result=$this->call_json_data_api('http://vas.mobilogi.com/api.php?username=rupeeboss&password=pass1234&route=1&sender=FINMRT&mobile[]='.$req->mobile_no.'&message[]='.$newsms,$post_data);
              $http_result=$result['http_result'];
              $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=$s=str_replace('\\', "", $s);
              $update_user='';
              $obj = json_decode($m);

        }


         public function uploaddoc(Request $req) {
             
             $data=$req->all();
            /* $data = $this->request->input('json_decode');*/
             print_r($data); exit();
              $post_data=$data;
              $result=$this->call_json_data_api('api.magicfinmart.com/api/upload-doc',$post_data);
              $http_result=$result['http_result'];
              $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=$s=str_replace('\\', "", $s);
              $update_user='';
              $obj = json_decode($m);
}

        public function sales(Request $req){
       
        $query=DB::table('FBAMast')
            ->where('FBAID','=',$req->p_fbaid)
            ->update(['salescode' =>$req->p_remark]);

           if ($query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
        }

        public function loan(Request $req){
          // print_r($req->all());exit();
          $query=DB::table('FBARepresentations')
            ->where('FBAID','=',$req->fba_id)
            ->update(['LoanID' =>$req->remark]);
           if ( $query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
        }

        public function posp(Request $req){
           
          $query=DB::table('FBARepresentations')
            ->where('FBAID','=',$req->fbaid)
            ->update(['POSPNo' =>$req->posp_remark]);
           if ( $query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }

        }

        public function getfbapartner($partnerid)
        {          
          $fsmfbaquery = DB::select("call usp_load_partner_info($partnerid)");
          return json_encode($fsmfbaquery);    
        }

        public function getdoclistview($fbaid)
       {
         $doctype = DB::select("call get_fba_doc($fbaid)");
        
          return json_encode($doctype);
        }


        public function getpaymentlink($fbaid){
          
        
        $paymentlink=DB::select("call Usp_paymentlink($fbaid)");
         

           return json_encode($paymentlink);
  
          }

}


