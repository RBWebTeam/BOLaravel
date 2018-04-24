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
class fbadocumentsController extends Controller
{
	public function fbadocument(){
		return view ('dashboard.fba-documents');
	}

}