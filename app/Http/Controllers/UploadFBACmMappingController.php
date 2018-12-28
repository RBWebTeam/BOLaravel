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
use Schema;
use fopen;
class UploadFBACmMappingController extends Controller
{

  /*update pincode mapping*/

public function uploadpincode ()
{
  return view ('dashboard.upload-pincode-mapping');
}
public function pincodeimportExcel(Request $request)
{        
 try{
  $data = array();
  $error_array = array();

  if($_FILES['pin_update_exl_file']['name'] != ''){

        if($request->hasFile('pin_update_exl_file')){
           Excel::load($request->file('pin_update_exl_file')->getRealPath(), function ($reader)use($data){
          $excel_rows = $reader->toArray();
        foreach ($excel_rows as $key => $row){
          if(!empty($row['pincode'])){
           if(!empty($row['srno'])){ 
              $row['error_check_mode'] = 1;     
              $result_data = $this->updateexcelsheet($row);
              if($result_data[0]-> result !=  "No Errors"){
                $exploded_array = explode(',',$result_data[0]-> result);
                foreach($exploded_array as $p_key => $p_value){
                  $error_array[] = $p_value;
                }
              } 
              if($result_data[0]-> result ==  "No Errors"){
                //new sp call 

                $this-> update_fbacrmmapping($row);
                $row['error_check_mode'] = 0;
                $result_data = $this->updateexcelsheet($row);
              }
            }else{
              $error_array[] = "SrNo Does Not Exist.Please Check File";
            }
          }
        }
          if(isset($error_array) and !empty($error_array)){
            echo json_encode(array('status'=>'error','messege'=>$error_array));
          }else{
            $response_array = array('status'=>'success',"messege"=>"Your File Successfully Uploaded and Updated");
            echo json_encode($response_array);
          }
      });
              
      }
    }else{
      $error_array[] = "Please Upload File";
      echo json_encode(array('status'=>'error','messege'=>$error_array));
    }
}
catch (Exception $e){
  return $e;               
} 
}

public function updateexcelsheet($req){  
     return DB::select('call update_pincode_citymapping(?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
            $req['pincode'],
            $req['rrmuid'],
            $req['recruiteruid'],
            $req['loanuid'],
            $req['motoruid'],
            $req['healthuid'],
            $req['onboarding'],
            $req['fieldsalesuid'],
            $req['clusterheaduid'],
            $req['stateheaduid'],
            $req['zonalheaduid'],
            $req['srno'],
            $req['error_check_mode']
          )
   );
   }

public function update_fbacrmmapping($row){

      $pincodes_heads = DB::select("call get_citypincodewise_heads(?)",array($row['pincode']));

if(count($pincodes_heads) > 0){
      $pincode = $pincodes_heads[0] -> pincode;
      $rrmuid = $pincodes_heads[0] -> rrmuid;
      $recuiteruid = $pincodes_heads[0] -> recuiteruid;
      $loanuid = $pincodes_heads[0] -> loanuid; 
      $motoruid = $pincodes_heads[0] -> motoruid;
      $healthuid = $pincodes_heads[0] -> healthuid;  
      $onboarding = $pincodes_heads[0] -> onboarding;
      $filedsalesuid = $pincodes_heads[0] -> filedsalesuid;
      $clusterheaduid = $pincodes_heads[0] -> clusterheaduid;
      $stateheaduid = $pincodes_heads[0] -> stateheaduid;
      $zonalheaduid = $pincodes_heads[0] -> zonalheaduid;

      $pincodewise_fbaid = DB::select("call get_pincodewise_fbamast(?)",array($row['pincode']));

      foreach($pincodewise_fbaid as $row_data){
       $FBAID = $row_data->FBAID;

        $data_fbacrm= DB::select("call get_fbaid_fbacrmmapping(?)",array($FBAID));

        if(count($data_fbacrm) > 0){
        $f_rrmuid = $data_fbacrm[0] -> rrmuid;
        $f_recruiteruid = $data_fbacrm[0] -> recruiteruid;
        $f_productloanuid = $data_fbacrm[0] -> productloanuid;
        $f_productmotoruid = $data_fbacrm[0] -> productmotoruid;
        $f_producthealthuid = $data_fbacrm[0] -> producthealthuid;
        $f_onboarding = $data_fbacrm[0] -> onboarding;
        $f_fieldsalesuid = $data_fbacrm[0] -> fieldsalesuid;
        $f_clusterheaduid = $data_fbacrm[0] -> clusterheaduid;
        $f_stateheaduid = $data_fbacrm[0] -> stateheaduid;
        $f_zonalheaduid = $data_fbacrm[0] -> zonalheaduid;

        if($f_rrmuid == $rrmuid){
          $upd_rrmuid = $row['rrmuid'];
        }else{
          if(!isset($f_rrmuid) and empty($f_rrmuid)){
            $upd_rrmuid = $row['rrmuid'];
          }else{
            $upd_rrmuid = null;
          }
        }

        if($f_recruiteruid == $recuiteruid){
          $upd_recruiteruid = $row['recruiteruid'];
        }else{
          if(!isset($f_recruiteruid) and empty($f_recruiteruid)){
            $upd_recruiteruid = $row['recruiteruid'];
          }else{
            $upd_recruiteruid = null;
          }
        }


        if($f_productloanuid == $loanuid){
          $upd_loanuid = $row['loanuid'];
        }else{
          if(!isset($f_productloanuid) and empty($f_productloanuid)){
            $upd_loanuid = $row['loanuid'];
          }else{
            $upd_loanuid = null;
          }
        }

        if($f_productmotoruid == $motoruid){
          $upd_motoruid = $row['motoruid'];
        }else{
          if(!isset($f_productmotoruid) and empty($f_productmotoruid)){
            $upd_motoruid = $row['motoruid'];
          }else{
            $upd_motoruid = null;
          }
        }

        if($f_producthealthuid == $healthuid){
          $upd_healthuid = $row['healthuid'];
        }else{
          if(!isset($f_producthealthuid) and empty($f_producthealthuid)){
            $upd_healthuid = $row['healthuid'];
          }else{
            $upd_healthuid = null;
          } 
        }


        if($f_onboarding == $onboarding){
          $upd_onboarding = $row['onboarding'];
        }else{
          if(!isset($f_onboarding) and empty($f_onboarding)){
            $upd_onboarding = $row['onboarding'];
          }else{
            $upd_onboarding = null;
          } 
        }

        if($f_fieldsalesuid == $filedsalesuid){
          $upd_fieldsalesuid = $row['fieldsalesuid'];
        }else{
          if(!isset($f_fieldsalesuid) and empty($f_fieldsalesuid)){
            $upd_fieldsalesuid = $row['fieldsalesuid'];
          }else{
            $upd_fieldsalesuid = null;
          }
        }

        if($f_clusterheaduid == $clusterheaduid){
          $upd_clusterheaduid = $row['clusterheaduid'];
        }else{
          if(!isset($f_clusterheaduid) and empty($f_clusterheaduid)){
            $upd_clusterheaduid = $row['clusterheaduid'];
          }else{
            $upd_clusterheaduid = null;
          }
        }

        if($f_stateheaduid == $stateheaduid){
          $upd_stateheaduid = $row['stateheaduid'];
        }else{
          if(!isset($f_stateheaduid) and empty($f_stateheaduid)){
            $upd_stateheaduid = $row['stateheaduid'];
          }else{
            $upd_stateheaduid = null;
          }
       }


        if($f_zonalheaduid == $zonalheaduid){
          $upd_zonalheaduid = $row['zonalheaduid'];
        }else{
          if(!isset($f_zonalheaduid) and empty($f_zonalheaduid)){
            $upd_zonalheaduid = $row['zonalheaduid'];
          }else{
            $upd_zonalheaduid = null;
          }
        }

        DB::select("call update_fbacrmmapping_checkeddata(?,?,?,?,?,?,?,?,?,?,?)",array(
          $FBAID,
          $upd_rrmuid,
          $upd_recruiteruid,
          $upd_loanuid,
          $upd_motoruid,
          $upd_healthuid,
          $upd_onboarding,
          $upd_fieldsalesuid,
          $upd_clusterheaduid,
          $upd_stateheaduid,
          $upd_zonalheaduid
         ));
         }
      }
   }
}
 

  /*pincode table*/  
 public function updatepintable()
 {
  $smdata=DB::select("call Load_city_Pincode_Mapping()");
  return view ('dashboard.pincode-update-table',['smdata'=>$smdata]);
 }
 
 /*update fba mapping*/
 
 public function uploadfbacmpaingdfn ()
{
  return view ('dashboard.upload-fba-mapping');
}


public function fbaimportExcel(Request $request)
{
        
 try{

  $data = array();
  $error_array = array();

  if($_FILES['fba_update_exl_file']['name'] != ''){
        if($request->hasFile('fba_update_exl_file')){
           Excel::load($request->file('fba_update_exl_file')->getRealPath(), function ($reader)use($data){
          $excel_rows = $reader->toArray();
        foreach ($excel_rows as $key => $row){
          if(!empty($row['fba_id'])){
           if(!empty($row['srno'])){      
              $result_data = $this->updatefbaexcelsheet($row);
              if($result_data[0]-> result !=  "Updated Successfully"){
                $exploded_array = explode(',',$result_data[0]-> result);
                foreach($exploded_array as $p_key => $p_value){
                  $error_array[] = $p_value;
                }
              } 
            }else{
              $error_array[] = "SrNo Does Not Exist.Please Check File";
            }
          }
        }

          if(isset($error_array) and !empty($error_array)){
            echo json_encode(array('status'=>'error','messege'=>$error_array));
          }else{
            $response_array = array('status'=>'success',"messege"=>"Your File Successfully Uploaded and Updated");
            echo json_encode($response_array);
          }
          
  });
              
      }
    }else{
      $error_array[] = "Please Upload File";
      echo json_encode(array('status'=>'error','messege'=>$error_array));
    }
}
catch (Exception $e){
  return $e;               
} 
}
  public function updatefbaexcelsheet($req){  
     return DB::select('call update_crm_mapping(?,?,?,?,?,?,?,?,?,?,?,?)',array(
            $req['fba_id'],
            $req['rrmuid'],
            $req['recruiteruid'],
            $req['productloanuid'],
            $req['productmotoruid'],
            $req['producthealthuid'],
            $req['onboarding'],
            $req['fieldsalesuid'],
            $req['clusterheaduid'],
            $req['stateheaduid'],
            $req['zonalheaduid'],
            $req['srno']
          )
   );
   }


   public function usercalledreport(){
    return view('dashboard.user-called-report');
   }
 }



