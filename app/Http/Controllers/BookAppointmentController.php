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
class BookAppointmentController extends CallApiController
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
       //   $query = DB::table('product_master')->select('Product_Id','Product_Name')->get();
       //   // print_r($query);exit();

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
        // print_r($file);exit();
        try {
           if($file == null){
            throw new \Exception("Upload Document ", 1);
          }
          // $destinationPath = 'uploads/sales_material/';
          $destinationPath = public_path().'/uploads/sales_material/';
          // print_r($destinationPath);exit();
          $filename=rand(1, 999).$file->getClientOriginalName();
          // print_r($filename);exit();
          $file->move($destinationPath,$filename);
           $query=DB::table('sales_material_upload')
            ->insert(['prod_id'=>$Product,
              'company_id'=>$Company,
              'language'=>$Language,
              'user_id'=>$user_id,
              'image_path'=>'uploads/sales_material/'.$filename,
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

      	
      		$query = DB::table('sales_material_upload')->select('id','image_path')->where('prod_id','=', $req->Product)->where('company_id','=',$req->Company)->get();
       	// print_r($query);exit();
      		 return $query;


        
      }

      public function sales_material_delete(Request $req){
          $res['status']=0;
          $res['msg']="success";
          try {
            
           $query=DB::table('sales_material_upload')->where('id', '=', $req->id)->delete();
          if ($query) {
            return response()->json(array('status' =>0,'message'=>"success"));
          }
          } catch (Exception $e) {
            return response()->json(array('status' =>1,'message'=>$ee->getMessage()));
          }
          
          
      }


      public function health_packages(){
        return view('health-packages');
      }

      public function health_insurance_packages(Request $req)
      {
            $post_data='{"apptrebook_input":null,"status_input":null,"apptdetail":null,"pack_details":{"username":"Datacomp","pass":"Health@1234","fromamt":0,"toamt":0,"fromage":0,"toage":0,"gender":"M"},"slot_inputdata":null,"provider_data":null,"pack_param":null}';
            // print_r($post_data);exit();
            $url = "http://www.healthassure.in/Products/HAMobileProductService.asmx/PackDetails";
            $result=$this->call_json_data_api($url,$post_data);
            $http_result=$result['http_result'];
            $error=$result['error'];
            $st=str_replace('"{', "{", $http_result);
            $s=str_replace('}"', "}", $st);
            $m=$s=str_replace('\\', "", $s);
            // print_r($http_result);exit();
            $obj=json_decode($m);
            return response()->json( $obj);


       }

       public function health_insurance_analysis(Request $req)
       {
         // print_r($req->PackCode);exit();
            $data=$req->PackCode;
            $post_data='{"pack_param":{"username":"Datacomp","pass":"Health@1234","packcode":'.$req->PackCode.'}}';
            // print_r($post_data);
            $url = "http://www.healthassure.in/Products/HAMobileProductService.asmx/PackParam";
            $result=$this->call_json_data_api($url,$post_data);
            $http_result=$result['http_result'];
            $error=$result['error'];
            $st=str_replace('"{', "{", $http_result);
            $s=str_replace('}"', "}", $st);
            $m=$s=str_replace('\\', "", $s);
            // print_r($http_result);exit();
            $obj=json_decode($m);
            return response()->json( $obj);

       }

       public function order_summary(){
        return view('order-summary');
      }

       
        
}
