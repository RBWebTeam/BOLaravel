<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Validator;
class ImportsalesdataController  extends Controller
{ 
  public function getsalesview()
  {
        return view('Importsalesdata');
  }

  public function importExcel(Request $request)
  {
  	
        $data=array();
 try{
        if($request->hasFile('import_file'))
        {
        	//print_r($request->file('import_file'));exit();
            Excel::load($request->file('import_file')->getRealPath(), function ($reader)use($data){
            //	print_r($reader);exit();

                foreach ($reader->toArray() as $key => $row) 
                {
                    if(!empty($row))
                         {                          	
                           $this->import($row); 
                         }
                    
                }
            });
              
        }
    }
    catch (Exception $e)
        {
           return $e;               
        }
    Session::flash('message', 'Your File Successfully Imported');           
    return Redirect('import-sales-data'); 
  }

  public function import($value)
 {
 	
 	if(!empty($value['source']))
 	{
 	 $fbaid=Session::get('fbaid');
    DB::select('call insert_all_sales_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
  	  $value['source'],
 	    $value['product'],
 	    $value['lm_status'],
 	    $value['platform'],
 	    $value['agent'],
 	    $value['reporting'],
 	    $value['insurer'],
 	    $value['pb_crn'],
 	    $value['erp_cs'],
 	    $value['reg_no'],
 	    $value['premium'],
 	    $value['od_addon'],
 	    $value['disc'],
 	    $value['transact_on'],
 	    $fbaid ));
    }

 
  }
}