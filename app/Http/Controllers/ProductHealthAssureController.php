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

class ProductHealthAssureController extends Controller{


public function product_health_assure(){ 
$query=DB::select("call getSystemMISInsuranceDetailReport('Health','2017-01-01','2040-10-05')");
    return view ('dashboard.product-health-assure',['query'=>$query]);
}
 
public function producthealthreportfdateldate($ProductName,$formdate,$enddate){ 
$query=DB::select("call getSystemMISInsuranceDetailReport('$ProductName','$formdate','$enddate')");
return view('dashboard.product-health-assure',['query'=>$query,'ProductName'=>$ProductName]);
}


}