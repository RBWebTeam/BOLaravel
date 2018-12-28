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
class MISReportForFBAController extends CallApiController{


		public function allfbamisreport(){
	 $sreportmis=DB::select("call getAllBusinessMISReportForFBA('95','31-01-2017','31-01-2020')");
        return view('fba-mis-report',['sreportmis'=>$sreportmis]);     
}

	      public function fbamisreportfdateldate($startdate,$enddate){
				//print_r($fdate);exit();
		 $fbaid=Session::get('fbaid');
		 		$fdate = $startdate;
		 		$tdate = $enddate;
		 		// $fdate = str_replace('-', '/',$startdate);
		 		// $tdate = str_replace('-', '/',$enddate);
		 $sreportmis=DB::select("call getAllBusinessMISReportForFBA('$fbaid','$fdate','$tdate')");
			    return $sreportmis;
			 
	}

}