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
      
        public function fba_list(){
         //$query=DB::select("call usp_load_fbalist_new(0)");
         $doctype = DB::select("call get_document_type()");
         //print_r($doctype); exit();

          
          return view('dashboard.fba-list',['doctype'=>$doctype]);         
        }
        public function get_fba_list(Request $req){
          $id=Session::get('FBAUserId');
        // print_r($id); exit();
          $query=DB::select("call fbaList(0)");

          return json_encode(["data"=>$query]);
        }

        public function updateposp($fbaid,$value,$flag) {
          DB::select("call usp_update_posploanid('$fbaid','$value','$flag')");
          return redirect('fba-list');
        }

// sales code start
      public function salesupdate($salescode,$fbaid) {
          DB::select("usp_update_sales_code('$salescode','$fbaid')");
          return redirect('fba-list');
        }

// sales code end



              public function sendsms(Request $req) {
              $newsms = urlencode($req->sms); //htmlspecialchars();

              $post_data="";
              $result=$this->call_json_data_api('http://vas.mobilogi.com/api.php?username=rupeeboss&password=pass1234&route=1&sender=FINMRT&mobile[]='.$req->mobile_no.'&message[]='.$newsms,$post_data);
              $http_result=$result['http_result'];
              $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=$s=str_replace('\\', "", $s);
             
              $obj = json_decode($m);
              return $obj;
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
        // print_r($req->all());exit();
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
          // print_r($req->all());exit();
          $query=DB::table('FBARepresentations')
            ->where('FBAID','=',$req->fbaid)
            ->update(['POSPNo' =>$req->posp_remark]);
           // if ( $query) {
           //    return response()->json(array('status' =>0,'message'=>"success"));
           //  }

             try{
    
  $data='{"PospNo":"'.$req->posp_remark.'","ProdId":"","SuppAgentId":"","FBAId":"'.$req->fbaid.'"}';

     //print_r($data);exit();
     $type= array("cache-control: no-cache","content-type: application/json", "token:1234567890");
 
     $result=$this->call_other_data_api('http://apiservices.magicfinmart.com/api/Client/UpdatePospId',$data,$type);
 
       $http_result=$result['http_result'];
       $error=$result['error'];
              $st=str_replace('"{', "{", $http_result);
              $s=str_replace('}"', "}", $st);
              $m=str_replace('\\', "", $s);
              $update_user='';        
              $custrespon = response()->json(array('status' =>0,'message'=>"success"));
       }
           catch (Exception $e){

           return $e->getMessage();    
    }        
           return ($custrespon);



        }

        public function getfbapartner(Request $req)
        {          
          $fsmfbaquery = DB::select("call usp_load_partner_info(?)",[$req->partnerid]);

          return json_encode($fsmfbaquery);    
        }

        public function getdoclistview($fbaid)
       {
         $doctype = DB::select("call get_fba_doc($fbaid)");
          $url=$this::$api_url;
          $data = array('data' => $doctype, 'url'=>$url);
          return json_encode($data);
        }




        public function getpaymentlink($fbaid){
        $paymentlink=DB::select("call Usp_paymentlink($fbaid)");
        return json_encode($paymentlink);
   }



         public function getcustomerid1 ($fbaid){
 try{
    $data= array("FBAId"=>"$fbaid");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/set-cust-id',$post_data,$type);
    $custrespon=$result['http_result'];
    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
           return ($custrespon);      
      }


   public function getupdateloanid ($fbaid){
  try{
    $data= array("fbaid"=>"$fbaid");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
 
     $post_data=json_encode($data);
     $type=$token;
     $result=$this->call_other_data_api($this::$api_url.'/api/updateloanid',$post_data,$type);
     $custrespon=$result['http_result']; 
     $custrespon_new= $custrespon;
     $datax=json_decode($custrespon);
 
     if($datax->StatusNo==0){      
      $loanid=($datax->MasterData[0]->LoanID);    
      $dataloan= array("fbaid"=>"$fbaid","LoanId"=>"$LoanID");
     $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
     $post_data1=json_encode($dataloan);
     $type=$token;
     $result=$this->call_other_data_api('http://apiservices.magicfinmart.com/api/Client/UpdateLoanId',$post_data1,$type);
      $custrespon=$result['http_result'];   
      return array("loanid"=>$loanid,"message"=>"Loan Id Updated Successfully");
      
    }
   else{
     return array("loanid"=>0,"message"=>$datax->Message);
   } 
    
             
    
}
  catch (Exception $e){

        return $e->getMessage();    
   }        
           return ($custrespon_new);      
      }

     

// Genratepaylink

       public function paylinkget($fbaid){
             // print_r($fbaid);exit();
         try{
          $m=$this::getPaymentLinkFromFinmart($fbaid);
          $data=json_decode($m);
          
          $res=$this::savePaymentInOldFinamrtDB($fbaid,$data->MasterData);
          $custpay = json_decode($res);
           
  }
       catch (Exception $e){

       return $e->getMessage();    
    }        
       return ($m);  

 } 

      public function sendpaysms(Request $req){
   
      $text="Your payment link is genrated";
      $newsms = urlencode( $text.":".$req->txtlink);//htmlspecialchars();
       //print_r($newsms); exit();
      $post_data="";
      $result=$this->call_json_data_api('http://vas.mobilogi.com/api.php?username=rupeeboss&password=pass1234&route=1&sender=FINMRT&mobile[]='.$req->txtmono.'&message[]='.$newsms,$post_data);
       $http_result=$result['http_result'];
       $error=$result['error'];
       $st=str_replace('"{', "{", $http_result);
       $s=str_replace('}"', "}", $st);
       $m=$s=str_replace('\\', "", $s);
       $obj = json_decode($m);
       return $obj;
    }

 // vivek start
 //fba master*******

        
           public function fbamaster(){
           return view('fbamaster_data');
        }

           public function getfbaid(Request $req){ 
          $data = DB::select("call get_fbamast_data(?)",array($req->id));
          return response()->json($data);
   }

          public function update_fba_table(Request $req)
       {
          $arra= array('FirsName'=>$req->f_name,'LastName'=>$req->l_name,'emailID'=>$req->work_email,'MobiNumb1'=>$req->mobile);
          $que=DB::table('FBAMast')->where('FBAID','=',$req->fba_id)->update($arra);
           return redirect('fbamaster-edit');
       }


private function getPaymentLinkFromFinmart($fbaid){
       $data='{"FBAID": "'.$fbaid.'"}';
       $type= array("cache-control: no-cache","content-type: application/json", "token:1234567890");
       $result=$this->call_other_data_api($this::$api_url.'/api/get-posp-payment-link',$data,$type);
       $http_result=$result['http_result'];
       $error=$result['error'];
       $st=str_replace('"{', "{", $http_result);
       $s=str_replace('}"', "}", $st);
       $m=str_replace('\\', "", $s);
       return $m;
}
private function savePaymentInOldFinamrtDB($fbaid,$masterdata){
 // print_r($masterdata);exit();
  $data2='{"FBAID":"'.$fbaid.'","PayURL":"'.$masterdata->PaymentURL.'","PayRefrenceID":"'.$masterdata->PaymRefeID.'","DWTCustID": "'.$masterdata->PaymRefeID.'","PCode":"501"}';
  $type= array("cache-control: no-cache","content-type: application/json", "token:1234567890");
   $result=$this->call_other_data_api('http://apiservices.magicfinmart.com/api/SaveFBA/AddMPSInfo',$data2,$type);
       $http_result=$result['http_result'];
       $error=$result['error'];
       $st=str_replace('"{', "{", $http_result);
       $s=str_replace('}"', "}", $st);
       $m=str_replace('\\', "", $s);
       return $m;
      
}
}