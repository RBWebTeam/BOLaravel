<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;


class PiechartController extends Controller
{
       public function getpiechartnew1(){
       	//$query=DB::table('bank_quote_api_request')->select('status','City','id','BrokerId')->get();
			//$query = DB::select('call getpercentage()');
			// print_r($query);
			
			return view('Piechart');
			
  }
 


 // public function getpiechartnew2(){
 //       	// $query=DB::table('bank_quote_api_request')->select('status','City','id','BrokerId')->get();
	// 		$query = DB::select('call getproductpercentage()');
	// 		// print_r($query);
			
	// 		return view('paychart',['query'=>$query]);
 //  }

 
     
}
