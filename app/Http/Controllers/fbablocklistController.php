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
class fbablocklistController extends Controller
{
	public function  fbablocklist(){

		$query=DB::select("call usp_load_fbalist_new(0)");
		 
		
		/* print_r($users); exit();
*/
                // $query=array(1,2,3,4);
		return view ('dashboard.fbablocklist',['query'=>$query]);
	}

	public function fbablockunblock($flag,$value){
          
          /*print_r($req->id);*/
		   
	      DB::statement("call Usp_updatefba_block_Unblock('$flag','$value')");

		 return Redirect ('fba-blocklist');


		
		}
	}
