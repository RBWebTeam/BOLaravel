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
class allsalesreportController extends CallApiController{


			    public function allreport(){
			    $sreport=DB::select("call getAllSalesReport('01-31-2017','01-31-2020')");
        	    return view('all-sales-report',['sreport'=>$sreport]);     
}

		 		public function salesreportfdateldate($startdate,$enddate){
				//print_r($fdate);exit();
		 		$fdate = $startdate;
		 		$tdate = $enddate;
		 		// $fdate = str_replace('-', '/',$startdate);
		 		// $tdate = str_replace('-', '/',$enddate);
			    $sreport=DB::select("call getAllSalesReport('$fdate','$tdate')");
			    return $sreport;
			 
	}

		 		public function salesreportlone($startdate,$enddate){
				//print_r($fdate);exit();
		 		$fdate = $startdate;
		 		$tdate = $enddate;
		 		// $fdate = str_replace('-', '/',$startdate);
		 		// $tdate = str_replace('-', '/',$enddate);
			    $sreport=DB::select("call  getAllSalesReportLoan('$fdate','$tdate')");
			    return $sreport;
			 
	}


       
				public function allMISreport(){
				$misreport=DB::select("call getAllBusinessMISReport('31-01-2017','31-01-2020')");
        		return view('all-mis-report',['misreport'=>$misreport]);     
}

		 		public function misreportfdateldate($startdate,$enddate){
				// print_r($startdate);exit();
		 		$fdate = $startdate;
		 		$tdate = $enddate;

			// $fdate = str_replace('-', '/',$startdate); 	
		 	// 	$tdate = str_replace('-', '/',$enddate);
			    $misreport=DB::select("call getAllBusinessMISReport('$fdate','$tdate')");
			    return $misreport;
			 
	}

		 		public function creditcardreport($startdate,$enddate){
				//print_r($fdate);exit();
		 		$fdate = $startdate;
		 		$tdate = $enddate;
		 		// $fdate = str_replace('-', '/',$startdate);
		 		// $tdate = str_replace('-', '/',$enddate);
			    $ccreport=DB::select("call  getAllSalesReportCreditCard('$fdate','$tdate')");
			    return $ccreport;
			 
	}











	}