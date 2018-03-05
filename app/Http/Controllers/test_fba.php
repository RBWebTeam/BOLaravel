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
use App\library\Pagination ;

class FbaController extends CallApiController
{
      
        public function fba_list(){    //sp_page_date_count('2018-03-12','2018-03-12',1) sp_page_search

$pagin=new Pagination();
$count=DB::table("FBAMast")->select('fbaid')->get();



if(isset($_GET['from_date'])  && isset($_GET['from_to'])){  
          Session::forget('set_count');
     
        $cou=DB::select("call sp_page_date_count(?,?,?)",array($_GET['from_date'],$_GET['from_to'],'R'));

        $query=DB::select('call sp_page_date_search(?,?,?)',array($_GET['from_date'],$_GET['from_to'],'R'));


      
               $total=$cou[0]->total;
               $minid=$cou[0]->minid;
               $maxid=$cou[0]->maxid;
               $page=$maxid/10;
               $set_count=Session::put('set_count',$cou);
         

      $pagina=$pagin->displayPaginationBelow(10,$page,$total,"search1");
 
   
}else if(isset($_GET["search1"])){  

               $cou=Session::get('set_count'); 
               $total=$cou[0]->total;
               $minid=$cou[0]->minid;
               $maxid=$cou[0]->maxid;

 
 
 
    $page=(int)$_GET["search1"];
    $setLimit = 10;
    $pageLimit = ($page * $setLimit) - $setLimit;
    $pagina=$pagin->displayPaginationBelow($setLimit,$page, $total,'search1');

    $query=DB::select('call sp_page_search(?,?,?)',array($minid+$pageLimit,$setLimit,'R'));

 

}else if(isset($_GET["search"])){
     
    $page = (int)$_GET["search"];
    $setLimit = 10;

    $pageLimit = ($page * $setLimit) - $setLimit;echo $pageLimit;exit;
    $pagina=$pagin->displayPaginationBelow($setLimit,$page,3718,'search');
    $query=DB::select('call sp_page_search(?,?,?)',array($pageLimit,$setLimit,'R'));


     

}else{
   
    $page = 1;
    $setLimit = 10;
    $pageLimit = ($page * $setLimit) - $setLimit;
    $pagina=$pagin->displayPaginationBelow($setLimit,$page,3718,'search');
    $query=DB::select('call sp_page_search(?,?,?)',array($pageLimit,$setLimit,'R'));
}



 

       //  $query=DB::select("call usp_load_fbalist_new(0)");
         $doctype = DB::select("call get_document_type()");
        
         //print_r($doctype); exit();
          return view('dashboard.fba-list',['query'=>$query,'doctype'=>$doctype,'pagina'=>$pagina]);
        }

        public function updateposp($fbaid,$value,$flag) {
          DB::select("call usp_update_posploanid('$fbaid','$value','$flag')");
          return redirect('fba-list');
        }
        public function sendsms(Request $req) {

              $newsms = str_replace(' ', '%20', $req->sms);
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

        public function sales(Request $req){
       
        $query=DB::table('fbamast')
            ->where('FBAID','=',$req->p_fbaid)
            ->update(['salescode' =>$req->p_remark]);
           if ( $query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
        }

        public function loan(Request $req){
          // print_r($req->all());exit();
          $query=DB::table('fbarepresentations')
            ->where('FBAID','=',$req->fba_id)
            ->update(['LoanID' =>$req->remark]);
           if ( $query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
        }

        public function posp(Request $req){
          // print_r($req->all());exit();
          $query=DB::table('fbarepresentations')
            ->where('FBAID','=',$req->fbaid)
            ->update(['POSPNo' =>$req->posp_remark]);
           if ( $query) {
              return response()->json(array('status' =>0,'message'=>"success"));
            }
        }




}


