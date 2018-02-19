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
        
}
