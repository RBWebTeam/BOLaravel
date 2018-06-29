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
class nonfbaController extends CallApiController
{


      public function nonfbalist(){
// data load
          $query = DB::select("call non_fba_fbaList(0)");   
          return json_encode(["data"=>$query]);     
        }

      public function getnonfba(){
    // page load
          return view('dashboard.non_fba_list');
        }

              public function nonfbaexportexcel(){
              $query=[];
              $query=DB::select('call non_fba_export_fbaList(0)');
              $data = json_decode( json_encode($query), true) ;
              return Excel::create('Non Fbalist', function($excel) use ($data) {
              $excel->sheet('mySheet', function($sheet) use ($data)
          {
              $sheet->fromArray($data);
          });
              })->download('xls');

}

}




