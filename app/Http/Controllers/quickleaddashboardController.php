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
class quickleaddashboardController extends Controller{

		public function getquicklead(){
		$query = DB::select("call Get_all_Quick_lead()"); 
		return view('quickleaddashboard',['query'=>$query]);

	}

  //         public function exportleadexcel(){
  //         $query=[];
  //         $query=DB::select('call all_Quick_lead_export()');
  //         $data = json_decode( json_encode($query), true) ;
  //         return Excel::create('Quick-lead', function($excel) use ($data) {
  //         $excel->sheet('Quick-lead-data', function($sheet) use ($data)
  //    {
		//  $sheet->fromArray($data);
  //     });
  //         })->download('xls');
		// }




}