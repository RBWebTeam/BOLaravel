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

  protected $err=''; 
  public function getsalesview()
  {
    return view('Importsalesdata');
  }

  public function importExcelhealth(Request $request)
  {
    if($request->hasFile('import_file_health')){
            $err1= $this->healtherror($request->file('import_file_health'));           
            if($err1==1){
             Session::flash('error', 'Your is File incorrect');           
             return Redirect('import-sales-data'); 
            }else if($err1==0){
                Session::flash('message', 'Your File Imported Successfully');           
             return Redirect('import-sales-data'); 
            }      
       }
   
 }
  public function healtherror($excel)
  { 
      $error='';
    Excel::load($excel->getRealPath(), function ($reader)use($error){       
       if(!empty($reader->toArray()) && array_key_exists('customer_name', $reader->toArray()[0])){
                       foreach ($reader->toArray() as $key => $row)  { 
                         if(isset($row['source'])){                            
                         $this->importhealth($row); 
                         }

                       }
          $this->err=0;
         }else{
          $this->err=1;
         }         
  });
 return   $this->err;
}

  public function importhealth($health)
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
  public function importExcelmotor(Request $request)
  {   

        if($request->hasFile('import_file_Motor'))
        {
            $err1= $this->motorerror($request->file('import_file_Motor'));           
            if($err1==1){
             Session::flash('error', 'Your is File incorrect');           
             return Redirect('import-sales-data'); 
            }else if($err1==0){
                Session::flash('message', 'Your File Imported Successfully');           
             return Redirect('import-sales-data'); 
            }
        }
    
  }
public function motorerror($excel)
{ 
      $error='';
    Excel::load($excel->getRealPath(), function ($reader)use($error){       
       if(!empty($reader->toArray()) && array_key_exists('reg_no', $reader->toArray()[0])){
                       foreach ($reader->toArray() as $key => $row)  { 
                         if(isset($row['source'])){                            
                         $this->importmotor($row); 
                         }

                       }
          $this->err=0;
         }else{
          $this->err=1;
         }         
    });
 return   $this->err;
}

  public function importmotor($motor)
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