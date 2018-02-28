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
}
