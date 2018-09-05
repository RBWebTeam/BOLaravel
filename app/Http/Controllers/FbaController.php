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
class FbaController extends CallApiController
{
      
           public function fba_list(){
           $doctype = DB::select("call get_document_type()");   
         //print_r($doctype); exit();
            return view('dashboard.fba-list',['doctype'=>$doctype]);         
        }

              public function exportexcel(){
              $query=[];
                $query=DB::select("call fbaList_export(0)");
              //$query=DB::select('call fbaList_export()');
              $data = json_decode( json_encode($query), true);
              return Excel::create('Fbalist', function($excel) use ($data) {
            $excel->sheet('FBADATA', function($sheet) use ($data)
            {

              $sheet->fromArray($data);
          });
              })->download('xls');

}

             // public function get_fba_list($fdate,$todate){
              public function get_fba_list(){
             //$id=Session::get('FBAUserId');
            $fbaid=Session::get('fbaid');
            $query=DB::select("call fbaList($fbaid)");
               // $query=DB::select("call fbaList('0','$fdate','$todate')");
            return json_encode(["data"=>$query]);
        }

             public function get_refresh_data($fbaid){
             $refresh=DB::select("call getnewaddedfba(0,$fbaid)");
            return json_encode($refresh);
         }



           public function get_fba_count($fbaid){
            $count=DB::select("call getfba_count($fbaid)");
             // print_r($count); exit();
             return json_encode($count);
         }






         //     public function get_all_fba_list_data($fdate,$todate){
         //     $alldata=DB::select("call get_fbaList_all_data(0,'2015-05-31','$todate')");
         //     return json_encode(["data"=>$alldata]);
         // }




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
              // $result=$this->call_json_data_api('http://vas.mobilogi.com/api.php?username=rupeeboss&password=pass1234&route=1&sender=FINMRT&mobile[]='.$req->mobile_no.'&message[]='.$newsms,$post_data);
          //     
         

//$result=$this->call_json_data_api('http://sms.cell24x7.com:1111/mspProducerM/sendSMS?user=rupee&pwd=apirupee&sender=FINMRT&mobile='.$req->mobile_no.'&msg='.$newsms.'&mt=0',$post_data);

         $result=$this->call_json_data_api('http://alrt.co.in/http-api.php?username=finmrt&password=pass1234&senderid=FINMRT&route=1&number='.$req->mobile_no.',&message='.$newsms,$post_data);
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

          public function getfbapartner(Request $req){ 
          $fsmfbaquery = DB::select("call usp_load_partner_info(?)",[$req->partnerid]);
          return json_encode($fsmfbaquery);    
        }

        public function getdoclistview($fbaid){
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
      $dataloan= array("fbaid"=>"$fbaid","LoanId"=>"$loanid");
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
      //$newsms = urlencode( $text.":".$req->divpartnertable_payment);//htmlspecialchars();
      $newsms = urlencode( $text.":".$req->txtlink);
       //print_r($newsms); exit();
      $post_data="";
      // $result=$this->call_json_data_api('http://vas.mobilogi.com/api.php?username=rupeeboss&password=pass1234&route=1&sender=FINMRT&mobile[]='.$req->txtmono.'&message[]='.$newsms,$post_data);

     // $result=$this->call_json_data_api('http://sms.cell24x7.com:1111/mspProducerM/sendSMS?user=rupee&pwd=apirupee&sender=FINMRT&mobile='.$req->txtmono.'&msg='.$newsms.'&mt=0',$post_data);
      $result=$this->call_json_data_api('http://alrt.co.in/http-api.php?username=finmrt&password=pass1234&senderid=FINMRT&route=1&number='.$req->txtmono.',&message='.$newsms,$post_data);


       $http_result=$result['http_result'];
       $error=$result['error'];
       $st=str_replace('"{', "{", $http_result);
       $s=str_replace('}"', "}", $st);
       $m=$s=str_replace('\\', "", $s);
       $obj = json_decode($m);
       return $obj;
    }


 //fba master edit *******
           public function fbamaster(){
           return view('fbamaster_data');
        }

          public function getfbaid(Request $req){ 
            
          $data = DB::select("call get_fbamast_data(?)",array($req->id));
          return response()->json($data);
   }  

          public function update_fba_table(Request $req){
         //echo $dbirth = str_replace('-','',$req->dbirth);
    $id=Session::get('fbauserid');
$msg=DB::select('call usp_update_fba_details(?,?,?,?,?,?,?)',array(
    $req->fba_id,      
    $req->f_name, 
    $req->l_name,  
    $req->work_email,
    $req->mobile,
    $req->dbirth,
    $req->midname, 
    $id 
));

  //print_r($msg);exit();

   Session::flash('message', 'Record has been Updated successfully'); 
           return redirect('fbamaster-edit');


// if($Result != 1){
//            Session::flash('message', 'Record has been Updated successfully'); 
//            return redirect('fbamaster-edit');
//          }else{
//               ('mesage); 
//            return redirect('fbamaster-edit');
//          }
 
   // $arra= array('FirsName'=>$req->f_name,'LastName'=>$req->l_name,'emailID'=>$req->work_email,'MobiNumb1'=>$req->mobile,'DOB'=>$req->dbirth,'MiddName'=>$req->midname,);
          // $que=DB::table('FBAMast')->where('FBAID','=',$req->fba_id)->update($arra);
           
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

public function UpdatePospno($id)
{
   try{
    $data= array("FBAID"=>"$id");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");

     $post_data=json_encode($data);
     
     $type=$token;
     $result=$this->call_other_data_api($this::$api_url.'/api/backoffice-posp-registration',$post_data,$type);
     $pospno=$result['http_result']; 
     $pospno_new= $pospno;
     

     return $pospno;
     
}
  catch (Exception $e){

       
   }        
         


}



}