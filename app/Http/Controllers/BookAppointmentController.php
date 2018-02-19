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
        
}
