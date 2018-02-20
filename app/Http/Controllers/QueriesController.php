<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Excel;

class QueriesController extends Controller
{
       

        public function queries(Request $req){

                 $status=0;
                 $query=[];
        	   if($req->queries==1 || $req->export==1){
                     $query=DB::select('call usp_load_trans_details_posp() ');
                               if(isset( $req->export)){
                               	    $data = json_decode( json_encode($query), true) ;
							        return Excel::create('laravelcode', function($excel) use ($data) {
							            $excel->sheet('mySheet', function($sheet) use ($data)
							            {
							                $sheet->fromArray($data);
							            });
							        })->download('xls');
                               }


        	     
        	     $status=1;
        	     }else if($req->queries==2 || $req->export==2){
                     $query=DB::select('call usp_load_tran_det_pospnc() ');
                               if(isset( $req->export)){
                               	    $data = json_decode( json_encode($query), true) ;
							        return Excel::create('laravelcode', function($excel) use ($data) {
							            $excel->sheet('mySheet', function($sheet) use ($data)
							            {
							                $sheet->fromArray($data);
							            });
							        })->download('xls');
                               }


        	     
        	      $status=2;
        	     }else if($req->queries==3 || $req->export==3){
                     $query=DB::select('call usp_load_policy_sold() ');
                               if(isset( $req->export)){
                                    $data = json_decode( json_encode($query), true) ;
                      return Excel::create('laravelcode', function($excel) use ($data) {
                          $excel->sheet('mySheet', function($sheet) use ($data)
                          {
                              $sheet->fromArray($data);
                          });
                      })->download('xls');
                               }


               
                $status=3;
               }else if($req->queries==4 || $req->export==4){
                     $query=DB::select('call usp_load_fba_never_logged() ');
                               if(isset( $req->export)){
                                    $data = json_decode( json_encode($query), true) ;
                      return Excel::create('laravelcode', function($excel) use ($data) {
                          $excel->sheet('mySheet', function($sheet) use ($data)
                          {
                              $sheet->fromArray($data);
                          });
                      })->download('xls');
                               }


               
                $status=4;
               }else if($req->queries==5 || $req->export==5){
                     $query=DB::select('call usp_load_inactive_posp() ');
                               if(isset( $req->export)){
                                    $data = json_decode( json_encode($query), true) ;
                      return Excel::create('laravelcode', function($excel) use ($data) {
                          $excel->sheet('mySheet', function($sheet) use ($data)
                          {
                              $sheet->fromArray($data);
                          });
                      })->download('xls');
                               }


               
                $status=5;
               }else if($req->queries==6 || $req->export==6){
                     $query=DB::select('call  usp_load_posp_without_posno() ');
                               if(isset( $req->export)){
                                    $data = json_decode( json_encode($query), true) ;
                      return Excel::create('laravelcode', function($excel) use ($data) {
                          $excel->sheet('mySheet', function($sheet) use ($data)
                          {
                              $sheet->fromArray($data);
                          });
                      })->download('xls');
                               }


               
                $status=6;
               }else if($req->queries==7 || $req->export==7){
                     $query=DB::select('call usp_load_without_payment() ');
                               if(isset( $req->export)){
                                    $data = json_decode( json_encode($query), true) ;
                      return Excel::create('laravelcode', function($excel) use ($data) {
                          $excel->sheet('mySheet', function($sheet) use ($data)
                          {
                              $sheet->fromArray($data);
                          });
                      })->download('xls');
                               }


               
                $status=7;
               }else if($req->queries==8 || $req->export==8){
                     $query=DB::select('call usp_load_transactions_today() ');
                               if(isset( $req->export)){
                                    $data = json_decode( json_encode($query), true) ;
                      return Excel::create('laravelcode', function($excel) use ($data) {
                          $excel->sheet('mySheet', function($sheet) use ($data)
                          {
                              $sheet->fromArray($data);
                          });
                      })->download('xls');
                               }


               
                $status=8;
               }


               

        	     return view('dashboard/queries',['query'=>$query,'status'=>$status]);
        }
}
