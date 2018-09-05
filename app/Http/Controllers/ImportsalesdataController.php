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

  public function importExcelhealth(Request $request)
  {
  	
        $data=array();
 try{
        if($request->hasFile('import_file_health'))
        {
        
            Excel::load($request->file('import_file_health')->getRealPath(), function ($reader)use($data){            

                foreach ($reader->toArray() as $key => $row) 
                { 
                //  print_r($row);exit();
                    if(!empty($row))
                         {                          	
                           $this->importhealth($row); 
                         }
                    
                }
            });
              
        }
    }
    catch (Exception $e)
        {
           return $e;               
        }
     Session::flash('message', 'Your File Uploaded Successfully');           
    return Redirect('import-sales-data');  
  }

  public function importhealth($health)
 {

 	if(!empty($health['source']))
 	{
 	 $fbaid=Session::get('fbaid');
    DB::select('call inset_health_sales_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
  	  $health['source'],
 	    $health['product'],
 	    $health['customer_name'],
 	    $health['agent_ss_id'],
 	    $health['agent'],
 	    $health['reporting'],
 	    $health['insurer'],
 	    $health['pb_crn'],
 	    $health['erp_cs'],
 	    $health['premium'],
 	    $health['description'],
 	    $health['date'],
 	    $health['status'],
 	    $fbaid ));
    }
  }
  public function importExcelmotor(Request $request)
  {
    
        $data=array();
 try{
        if($request->hasFile('import_file_Motor'))
        {
        
            Excel::load($request->file('import_file_Motor')->getRealPath(), function ($reader)use($data){            

                foreach ($reader->toArray() as $key => $row) 
                {
                   //print_r($row);exit();
                    if(!empty($row))
                         {                            
                           $this->importmotor($row); 
                         }
                    
                }
            });
              
        }
    }
    catch (Exception $e)
        {
           return $e;               
        }
     Session::flash('message', 'Your File Uploaded Successfully');           
    return Redirect('import-sales-data');  
  }

  public function importmotor($motor)
 {

  if(!empty($motor['source']))
  {
   $fbaid=Session::get('fbaid');
    DB::select('call insert_motor_sales_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
      $motor['source'],
      $motor['product'],
      $motor['agent'],
      $motor['reporting'],
      $motor['insurer'],
      $motor['pb_crn'],
      $motor['erp_cs'],
      $motor['reg_no'],
      $motor['premium'],
      $motor['od_addon'],
      $motor['disc'],
      $motor['transact_on'],
      $motor['fbaid'],
      $motor['erp_id'],
      $fbaid ));
    }
  }
}