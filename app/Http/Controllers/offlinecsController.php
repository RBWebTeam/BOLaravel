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
class OfflinecsController extends CallApiController
{
	public function getofflinecs()
	{
       $Genins=DB::select("call Usp_load_Generalins()");
       $lifeins=DB::select("call Usp_load_lifeinsurence()");       
       $health=DB::select("call get_health_genral_insurance()");
       $city=DB::select("call Usp_Get_city();");
       $fba=DB::select("call Usp_get_fba_data();");
       $productmgr=DB::select("call Usp_get_product_manager();");
       $productexe=DB::select("call Usp_get_product_executive();");
       $Executive=DB::select("call Usp_get_Executive();");
       $Executive1=DB::select("call Usp_get_Executive1();");
       $reason=DB::select("call Usp_get_reason_offlinecs();");
       $product=DB::select("call Usp_get_offlinecsproduct();");       
       
       return view('offlinecs',['Genins'=>$Genins,'lifeins'=>$lifeins,'health'=>$health,'city'=>$city,'fba'=>$fba,'productmgr'=>$productmgr,'productexe'=>$productexe,'Executive'=>$Executive,'Executive1'=>$Executive1,'reason'=>$reason,'product'=>$product]);
	}
	public function getstate($cityid)
  { 
		 
		 $state=DB::select("call Usp_get_state_on_city($cityid)");
		 return json_encode($state);

	}

	 public function insertofflinecs(Request $req)
    {
           $fbauser=Session::get('fbauserid');
          //print_r($req->all());exit();
           $filerc=$this->fileupload_fn($req->file('filerc'));
           $fileFitness=$this->fileupload_fn($req->file('fileFitness'));
           $filePUC=$this->fileupload_fn($req->file('filePUC'));
           $filebreakrp=$this->fileupload_fn($req->file('filebreakrp'));
           $fileCheque=$this->fileupload_fn($req->file('fileCheque'));
           $fileother=$this->fileupload_fn($req->file('fileother'));
           $fileProposalForm=$this->fileupload_fn($req->file('fileProposalForm'));
           $fileKYC=$this->fileupload_fn($req->file('fileKYC'));      
            
             $id= DB::select('call Usp_insert_motor_offlinecs(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
              $req->ddproduct,
              $req->txtcstname,
              $req->txtadd,             
              $req->ddlcity,
              $req->ddlstate,
              $req->ddlzone,
              $req->ddlregion,
              $req->txtmobno,
              $req->txttelno,
              $req->txtemail,
              $req->ddlfbaname,
              $req->txtposp,
              $req->txtpremiumamt,
              $req->txterpid,
              $req->txtqtno,
              $req->txtvehicalno,
              $req->txtexpdate,
              $req->txtbreakin,
              $req->ddlInsurermotor,
              $req->ddlpayment,
              $req->txtutrnomotor,
              $req->txtbankmotor,
              $req->txtexecutivename,
              $req->txtexecutivename1,
              $req->txtexeProductname,
              $req->txtmgrProductname,
              $filerc,
              $fileFitness,
              $filePUC,
              $filebreakrp,
              $fileCheque,
              $fileother,
              $req->txtPreexisting,
              $req->txtmedicalrp,
              $req->dllpremium,
              $fileProposalForm,
              $fileKYC,
              $req->ddlnoofpolicy,
              $req->txtmedicalcase,
              $req->ddlInsurerhealth,
              $req->ddlInsurerlife,
              $fbauser,
              $req->ddlwhyoffline,
              $req->txtReason,
              $req->ddlmapcity));              
            
            foreach ($id as $val) 
            {
              $ID=$val->Id;             
            }
            //print_r($ID);exit();

if ($filerc!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$filerc");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);
    $Response= json_decode($result['http_result']); 
    
    $shorturl=$Response->MasterData[0]->ShortURL;   
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'RCCopy',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
} 
if ($fileFitness!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileFitness");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'Fitness',$ID));
    
    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
}  
if ($filePUC!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$filePUC");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'PUC',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
} 
if ($filebreakrp!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$filebreakrp");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'break report',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
} 
if ($fileCheque!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileCheque");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();    
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'Cheque',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileother!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileother");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'other',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileProposalForm!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileProposalForm");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'Proposal Form',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileKYC!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileKYC");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'KYC',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}

      $offlinecsdata = DB::select("call Usp_get_motor_data($ID)"); 

      if ($offlinecsdata[0]->Product==1||$offlinecsdata[0]->Product==2||$offlinecsdata[0]->Product==3) 
              {             
               $FBAID=Session::get('fbaid');
               $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,1)"); 
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
            
             }
           }

      if ($offlinecsdata[0]->Product==4||$offlinecsdata[0]->Product==5) 
              {             
               $FBAID=Session::get('fbaid');
               $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,4)"); 
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
              
             }
           }

     if ($offlinecsdata[0]->Product==6) 
              {             
               $FBAID=Session::get('fbaid');
               $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,6)"); 
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
             
             }
           }
     Session::flash('message', 'Record has been saved successfully');           
      return Redirect('offlinecs');
}

  public  function fileupload_fn($image)
  {
            $declva='';
            if($image!=''){
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
            $image->move($destinationPath, $name);
            $declva=$name;
           }else
           {
              $declva='0';
           } 
             
             return $declva;
  }

   public function geterpid($fbaid)
   {
      $ERPID=DB::select("call Usp_get_ERPID_RRM_EXE($fbaid)");
       return json_encode($ERPID);

   }
     public function saveofflinecsdata(Request $req)
       {
          $fbauser=Session::get('fbauserid');
          //print_r($req->all());exit();
           $filerc=$this->fileupload_fn($req->file('filerc'));
           $fileFitness=$this->fileupload_fn($req->file('fileFitness'));
           $filePUC=$this->fileupload_fn($req->file('filePUC'));
           $filebreakrp=$this->fileupload_fn($req->file('filebreakrp'));
           $fileCheque=$this->fileupload_fn($req->file('fileCheque'));
           $fileother=$this->fileupload_fn($req->file('fileother'));
           $fileProposalForm=$this->fileupload_fn($req->file('fileProposalForm'));
           $fileKYC=$this->fileupload_fn($req->file('fileKYC'));      
            
             $id= DB::select('call Usp_save_offlinecs_data(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
              $req->ddproduct,
              $req->txtcstname,
              $req->txtadd,             
              $req->ddlcity,
              $req->ddlstate,
              $req->ddlzone,
              $req->ddlregion,
              $req->txtmobno,
              $req->txttelno,
              $req->txtemail,
              $req->ddlfbaname,
              $req->txtposp,
              $req->txtpremiumamt,
              $req->txterpid,
              $req->txtqtno,
              $req->txtvehicalno,
              $req->txtexpdate,
              $req->txtbreakin,
              $req->ddlInsurermotor,
              $req->ddlpayment,
              $req->txtutrnomotor,
              $req->txtbankmotor,
              $req->txtexecutivename,
              $req->txtexecutivename1,
              $req->txtexeProductname,
              $req->txtmgrProductname,
              $filerc,
              $fileFitness,
              $filePUC,
              $filebreakrp,
              $fileCheque,
              $fileother,
              $req->txtPreexisting,
              $req->txtmedicalrp,
              $req->dllpremium,
              $fileProposalForm,
              $fileKYC,
              $req->ddlnoofpolicy,
              $req->txtmedicalcase,
              $req->ddlInsurerhealth,
              $req->ddlInsurerlife,
              $fbauser,
              $req->ddlwhyoffline,
              $req->txtReason,
              $req->ddlmapcity));
             foreach ($id as $val) 
            {
              $ID=$val->Id;             
            }
            

if ($filerc!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$filerc");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);
    $Response= json_decode($result['http_result']); 
    
    $shorturl=$Response->MasterData[0]->ShortURL;   
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'RCCopy',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
} 
if ($fileFitness!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileFitness");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'Fitness',$ID));
    
    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
}  
if ($filePUC!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$filePUC");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'PUC',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
} 
if ($filebreakrp!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$filebreakrp");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'break report',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
} 
if ($fileCheque!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileCheque");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();    
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'Cheque',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileother!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileother");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'other',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileProposalForm!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileProposalForm");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'Proposal Form',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileKYC!=0) 
{
  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$fileKYC");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    //print_r($shorturl);exit();
    DB::select('call Usp_Insert_shortlink_offlinecs(?,?,?)',array($shorturl,'KYC',$ID));
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
 Session::flash('message', 'Record has been saved successfully');
return Redirect('offlinecs');
}
 public function getofflinecsdataedit($id)
 {
  $offlinecsdt=DB::select("call Usp_get_edit_data_offlinecs($id)");
   return json_encode($offlinecsdt);
 }
  public function Updateofflinecs(Request $req)
       {
          $fbauser=Session::get('fbauserid');
          //print_r($req->all());exit();
           $filerc=$this->fileupload_fn($req->file('filerc'));
           $fileFitness=$this->fileupload_fn($req->file('fileFitness'));
           $filePUC=$this->fileupload_fn($req->file('filePUC'));
           $filebreakrp=$this->fileupload_fn($req->file('filebreakrp'));
           $fileCheque=$this->fileupload_fn($req->file('fileCheque'));
           $fileother=$this->fileupload_fn($req->file('fileother'));
           $fileProposalForm=$this->fileupload_fn($req->file('fileProposalForm'));
           $fileKYC=$this->fileupload_fn($req->file('fileKYC'));  

              DB::select('call Usp_update_offlinecs(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
              $req->txtofflinecsid,
              $req->ddproduct,
              $req->txtcstname,
              $req->txtadd,             
              $req->ddlcity,
              $req->ddlstate,
              $req->ddlzone,
              $req->ddlregion,
              $req->txtmobno,
              $req->txttelno,
              $req->txtemail,
              $req->ddlfbaname,
              $req->txtpremiumamt,
              $req->txterpid,
              $req->txtqtno,
              $req->txtvehicalno,
              $req->txtexpdate,
              $req->txtbreakin,
              $req->ddlInsurermotor,
              $req->ddlpayment,
              $req->txtutrnomotor,
              $req->txtbankmotor,
              $req->txtexecutivename,
              $req->txtexecutivename1,
              $req->txtexeProductname,
              $req->txtmgrProductname,
              $filerc,
              $fileFitness,
              $filePUC,
              $filebreakrp,
              $fileCheque,
              $fileother,
              $req->txtPreexisting,
              $req->txtmedicalrp,
              $req->dllpremium,
              $fileProposalForm,
              $fileKYC,
              $req->ddlnoofpolicy,
              $req->txtmedicalcase,
              $req->ddlInsurerhealth,
              $req->ddlInsurerlife,
              $fbauser,
              $req->ddlwhyoffline,
              $req->txtReason,
              $req->ddlmapcity));
          
              $ID=$req->txtofflinecsid;             
            
            //print_r($ID);exit();

if ($filerc!=0) 
{
  try{
   $this->getshorturl($filerc,$ID,'RCCopy');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
} 
if ($fileFitness!=0) 
{
  try{
    $this->getshorturl($fileFitness,$ID,'Fitness');
    
    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
}  
if ($filePUC!=0) 
{
  try{
    $this->getshorturl($filePUC,$ID,'PUC');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
} 
if ($filebreakrp!=0) 
{
  try{
  $this->getshorturl($filebreakrp,$ID,'break report');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
} 
if ($fileCheque!=0) 
{
  try{
   $this->getshorturl($fileCheque,$ID,'Cheque');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileother!=0) 
{
  try{
    $this->getshorturl($fileother,$ID,'other');    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileProposalForm!=0) 
{
  try{

    $this->getshorturl($fileProposalForm,$ID,'Proposal Form');
    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileKYC!=0) 
{
  try{
    
    $this->getshorturl($fileKYC,$ID,'KYC');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
 Session::flash('message', 'Record has been Updated successfully');
 return Redirect('offlinecs');
}

public function getshorturl($filename,$ID,$doctype)
{  try{
    $data= array("longurl"=>"http://bo.magicfinmart.com/upload/offlinecs/$filename");
    $token=array("cache-control: no-cache","content-type: application/json", "token: 1234567890");
    $post_data=json_encode($data);
    $type=$token;
    $result=$this->call_other_data_api($this::$api_url.'/api/short-url-forall',$post_data,$type);

    $Response= json_decode($result['http_result']);
    $shorturl=$Response->MasterData[0]->ShortURL;
    DB::select('call Usp_Update_shortlink_offlinecs(?,?,?)',array($shorturl,$ID,$doctype));
    }
    catch (Exception $e)
    {
        return $e->getMessage();    
     } 
}

public function Updateofflinecsandsendmail(Request $req)
       {

          $fbauser=Session::get('fbauserid');
          //print_r($req->all());exit();
           $filerc=$this->fileupload_fn($req->file('filerc'));
           $fileFitness=$this->fileupload_fn($req->file('fileFitness'));
           $filePUC=$this->fileupload_fn($req->file('filePUC'));
           $filebreakrp=$this->fileupload_fn($req->file('filebreakrp'));
           $fileCheque=$this->fileupload_fn($req->file('fileCheque'));
           $fileother=$this->fileupload_fn($req->file('fileother'));
           $fileProposalForm=$this->fileupload_fn($req->file('fileProposalForm'));
           $fileKYC=$this->fileupload_fn($req->file('fileKYC'));      
            
             $id= DB::select('call Usp_update_offlinecsandsendmail(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
              $req->txtofflinecsid,
              $req->ddproduct,
              $req->txtcstname,
              $req->txtadd,             
              $req->ddlcity,
              $req->ddlstate,
              $req->ddlzone,
              $req->ddlregion,
              $req->txtmobno,
              $req->txttelno,
              $req->txtemail,
              $req->ddlfbaname,
              $req->txtpremiumamt,
              $req->txterpid,
              $req->txtqtno,
              $req->txtvehicalno,
              $req->txtexpdate,
              $req->txtbreakin,
              $req->ddlInsurermotor,
              $req->ddlpayment,
              $req->txtutrnomotor,
              $req->txtbankmotor,
              $req->txtexecutivename,
              $req->txtexecutivename1,
              $req->txtexeProductname,
              $req->txtmgrProductname,
              $filerc,
              $fileFitness,
              $filePUC,
              $filebreakrp,
              $fileCheque,
              $fileother,
              $req->txtPreexisting,
              $req->txtmedicalrp,
              $req->dllpremium,
              $fileProposalForm,
              $fileKYC,
              $req->ddlnoofpolicy,
              $req->txtmedicalcase,
              $req->ddlInsurerhealth,
              $req->ddlInsurerlife,
              $fbauser,
              $req->ddlwhyoffline,
              $req->txtReason,
              $req->ddlmapcity));
             
              $ID=$req->txtofflinecsid;             
            
            //print_r($ID);exit();

if ($filerc!=0) 
{
  try{
   $this->getshorturl($filerc,$ID,'RCCopy');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
} 
if ($fileFitness!=0) 
{
  try{
    $this->getshorturl($fileFitness,$ID,'Fitness');    
    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
}  
if ($filePUC!=0) 
{
  try{
    $this->getshorturl($filePUC,$ID,'PUC');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
      
} 
if ($filebreakrp!=0) 
{
  try{
  $this->getshorturl($filebreakrp,$ID,'break report');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
} 
if ($fileCheque!=0) 
{
  try{
   $this->getshorturl($fileCheque,$ID,'Cheque');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileother!=0) 
{
  try{
    $this->getshorturl($fileother,$ID,'other');    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileProposalForm!=0) 
{
  try{

    $this->getshorturl($fileProposalForm,$ID,'Proposal Form');
    
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}
if ($fileKYC!=0) 
{
  try{
    
    $this->getshorturl($fileKYC,$ID,'KYC');
  }
  catch (Exception $e){

        return $e->getMessage();    
     }        
}              
 $offlinecsdata = DB::select("call Usp_get_motor_data($ID)"); 

      if ($offlinecsdata[0]->Product==1||$offlinecsdata[0]->Product==2||$offlinecsdata[0]->Product==3) 
              {             
               $FBAID=Session::get('fbaid');
               $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,1)"); 
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
            
             }
           }

      if ($offlinecsdata[0]->Product==4||$offlinecsdata[0]->Product==5) 
              {             
               $FBAID=Session::get('fbaid');
               $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,4)"); 
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
              
             }
           }

     if ($offlinecsdata[0]->Product==6) 
              {             
               $FBAID=Session::get('fbaid');
               $emailids=DB::select("call getTOCCEmailIdForOfflineCS($FBAID,6)"); 
              foreach ($emailids as $val){                
               $tomail= $val->To_mail_id;
               $ccemail = explode(',',$val->CC_mail_id);               
              }
            
                
                $sub='SNo.'.$offlinecsdata[0]->ID.' '.$offlinecsdata[0]->product_name.'  Entry details for '.$offlinecsdata[0]->CustomerName.' - '.$offlinecsdata[0]->POSPName;
                
            if($emailids!='')
            {                
                  $mail = Mail::send('mailViews.sendmailofflinecs',['offlinecsdata' => $offlinecsdata], function($message)use($tomail,$ccemail,$sub){
                  $message->from('OfflineCS@magicfinmart.com', 'Fin-Mart');
                  $message->to($tomail);
                   foreach ($ccemail as $key => $cc) 
                   {
                     $message->cc($cc);
                    }
                  $message->subject($sub);

                  });
               if(Mail::failures())
                {
                   $error=3;
                   echo $error;
                }
             
             }
           }
 Session::flash('message', 'Record has been Updated successfully');
return Redirect('offlinecs');
}
 
}

