<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Response;

class ApiController extends CallApiController
{
    public function sales_material(Request $req){
        $res['status']=0;
        $res['msg']="success";

    	$FBAId=$req['FBAId'];
    	// $query = DB::table('sales_material_upload')->select('prod_id','image_path')->get();
    	$query = DB::table('sales_material_upload')
            ->join('product_master', 'sales_material_upload.prod_id', '=', 'product_master.Product_Id')
            
            ->select('sales_material_upload.*', 'product_master.Product_Name')
            ->get();
    	// print_r($query);
    	if ( $query) {
            	 $result=json_decode(json_encode(["sales_material"=>$query]));
         return response()->json(array('status' =>0,'message'=>"success",'result'=>$result));
            }
    }


         public function send_success_response($message,$status,$data){ 
         //print_r($message);
         $res = array('Message' =>$message ,'Status'=>$status,'StatusNo'=>0,'MasterData'=>$data );
         //print_r($res);exit();
         return Response::json($res);
       }

         public function send_failure_response($message,$status,$data){
         $res = array('Message' =>$message ,'Status'=>$status,'StatusNo'=>1,'MasterData'=>[] );
         return Response::json($res);
       }

         public function send_success_json_encode($data){
         return Response::json($data);
       }

}
