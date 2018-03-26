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
class BookAppointmentController extends Controller
{
       public function book_appointment(){
       	return view('book-appointment');
       }


  //      public function backoffice_city_master(){
	 //    $query = DB::table('city_master')->select('city_id', 'cityname')->get();
	 //    // print_r($query);exit();

	 //    echo json_encode($query);
  // } 


       public function sales_material_upload(){
       	return view('sales-material-upload');
       }

       // public function sales_material_product(){
       // 	$query = DB::table('product_master')->select('Product_Id','Product_Name')->get();
       // 	// print_r($query);exit();

       //  echo json_encode($query);
       // }

       // public function sales_material_company(){
       //  $query = DB::table('company_master')->select('Company_Id','Company_Name')->get();
       //  // print_r($query);exit();

       //  echo json_encode($query);
       // }

       public function sales_material_upload_submit(Request $req){
         //print_r(Session::all());exit();
        $res['status']=0;
        $res['msg']="success";
        $Product=$req['Product'];
         $Company=$req['Company'];
         $Language=$req['Language'];
        $document_name="image";
    	   $user_id=Session::get('fbauserid');
        $file=$req->file('file');
        try {
        	 if($file == null){
            throw new \Exception("Upload Document ", 1);
          }
          $destinationPath = 'uploads/sales_material/'.$Product.'/'.$Company.'/';
          $filename=$document_name.".".$file->getClientOriginalExtension();
          $file->move($destinationPath,$filename);
           $query=DB::table('sales_material_upload')
            ->insert(['prod_id'=>$Product,
              'company_id'=>$Company,
              'language'=>$Language,
              'user_id'=>$user_id,
              'image_path'=>$destinationPath.$filename,
              'is_active'=>1,
              'created_at'=>date("Y-m-d H:i:s"),
              'updated_at'=>date("Y-m-d H:i:s")]);
            if ($query) {
            	return response()->json(array('status' =>0,'message'=>"success"));
       }
        } catch (Exception $e) {
        		return response()->json(array('status' =>1,'message'=>$ee->getMessage()));
        }
        
       
      }

      public function sales_material(){
      	return view('sales-material');
      }

      public function sales_material_update(Request $req){
      	
      		$query = DB::table('sales_material_upload')->select('image_path')->where('prod_id','=', $req->Product)->where('company_id','=',$req->Company)->get();
       	// print_r($query);exit();
      		 return $query;

        
      }


       
       
        
}
