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
class LeadDetailsController extends Controller
{
       
        public function lead_details1(){


                 $query=DB::select("call usp_load_leads()");
         //print_r($query); exit();

                   
                 return view('dashboard.lead-details',['query'=>$query]);
        	 // return view('dashboard.lead-details');
               
        }
    }