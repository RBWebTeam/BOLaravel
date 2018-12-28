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
class RegistartionreportController extends CallApiController
{

			public function Regireport(){
				
			$rreport=DB::select("call Registartion_report('31-01-2017','31-01-2020')");
          	return view('Registartion-report',['rreport'=>$rreport]);         
        }


     		public function Regireportfdateldate($fdate,$ldate){
     		//print_r($fdate);exit();
     		$rreport=DB::select("call Registartion_report('$fdate','$ldate')");
			return $rreport;
			// return json_encode($rreport);
  	}

			public function Regideatil(){
			$rdetails=DB::select("call Registartion_report_details('31-01-2017','31-01-2020')");
			return view('Registartion-report-details',['rdetails'=>$rdetails]); 
        }



			public function Regireportdetails($fdate,$ldate){
			$query=[];
			$rdetails=DB::select("call Registartion_report_details('$fdate','$ldate')");
			   return view('Registartion-report-details',['rdetails'=>$rdetails]);       
        }

	    	 public function pocertification(){
			$rcreation=DB::select("call Registartion_Posp_Creation('31-01-2017','31-01-2020')");
			return view('posp-certification',['rcreation'=>$rcreation]); 
        }


            public function pocration($fdate,$ldate){
            $query=[];
			$rcreation=DB::select("call Registartion_Posp_Creation('$fdate','$ldate')");
			return view('posp-certification',['rcreation'=>$rcreation]); 
        }



	  	public function pocertificationdate(){
	$rcreationdate=DB::select("call Registartion_Posp_Creationdate('31-01-2017','31-01-2020')");
	return view('posp-certification-date',['rcreationdate'=>$rcreationdate]); 
        }

           public function pocredate($fdate,$ldate){
            $query=[];
			$rcreationdate=DB::select("call Registartion_Posp_Creationdate('$fdate','$ldate')");
			return view('Posp-certification-date',['rcreationdate'=>$rcreationdate]); 
        }




			public function nottregireport(){
			$notreport=DB::select("call Registartion_not_report('31-01-2017','31-01-2020')");
          	return view('Registartion-report',['notreport'=>$notreport]);         
        }


			public function notregireport($fdate,$ldate){
     		//print_r($fdate);exit();
     		$notreport=DB::select("call Registartion_not_report('$fdate','$ldate')");
			return $notreport;
			  
  	}



  	public function fbatocreation(){
	$fbatopospcre=DB::select("call get_fba_posp_creation_range('31-01-2017','31-01-2020')");
          	return view('Registartion-report',['fbatopospcre'=>$fbatopospcre]);         
        }


			public function creationfba($fdate,$ldate){
     		$fbatopospcre=DB::select("call get_fba_posp_creation_range('$fdate','$ldate')");
			return $fbatopospcre;
			  
  	}

  	  	public function fbatocertificationdate(){
  $cerficion=DB::select("call get_fba_posp_pospcertificationdate_range('31-01-2017','31-01-2020')");
          	return view('Registartion-report',['cerficion'=>$cerficion]);         
        }


        			public function fbatocertification($fdate,$ldate){
    $cerficion=DB::select("call get_fba_posp_pospcertificationdate_range('$fdate','$ldate')");
			return $cerficion;
			  
  	}





}
      

      