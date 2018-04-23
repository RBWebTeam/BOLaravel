<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HealthAssurePartnerController extends CallApiController
{


 public function getpartnerinfo(){
     try{
    $data=array("pack_param"=> array("username"=>"Datacomp","pass"=>"Health@1234","packcode"=>191));
 
     $post_data=json_encode($data);
    // print_r($post_data); exit();
                $result=$this->call_json_data_api('http://www.healthassure.in/Products/HAMobileProductService.asmx/PackParam',$post_data);
                $http_result=$result['http_result'];
                $error=$result['error'];
                $st=str_replace('"{', "{", $http_result);
                $s=str_replace('}"', "}", $st);
                $m=$s=str_replace('\\', "", $s);
                $update_user='';
                $obj = json_decode($m);
               // print_r($m); exit();
                
              
               

                   if($obj->d->status='Success'){

                         $respon=($obj->d->lstPackParameter);
                    }else{
                         $respon=0;
                    }
                    //print_r($respon); exit();
    }
    catch (Exception $e){
        return $e;    
     }
 	
    return view('dashboard.HealthAssurePartner',['respon'=>$respon]);
 }

public function providerlist(Request $req)
{

    try{
    $data=array("apptrebook_input"=>null,"status_input"=>null,"apptdetail"=>null,"pack_details"=>null,"slot_inputdata"=>null,"provider_data"=>array("username"=>"Datacomp","password"=>"Health@1234","latitude"=>"19.1629437","longitude"=>"72.8353005","packcode"=>$req->txtPackcode,"visittype"=>$req->txthomevisit,"apptdatetime"=>"30-03-2018"),"pack_param"=>null);
              $m=$this->responsejson($data);
              $obj = json_decode($m);
              return $m;
                    }
    catch (Exception $e){
        return $e;    
     }
}

private function responsejson($data){

     $result=$this->call_json_data_api('http://www.healthassure.in/Products/HAMobileProductService.asmx/getProviderList',json_encode($data));
                $http_result=$result['http_result'];
                $error=$result['error'];
                $st=str_replace('"{', "{", $http_result);
                $s=str_replace('}"', "}", $st);
                $m=$s=str_replace('\\', "", $s);
                $update_user='';
               return $m;
 }

 public function getproviderinfo(Request $req){
 //print_r($req->txtID);exit();
    $query=DB::select('call Usp_getproviderdata(?)',array(
      $req->txtID
     ));

    try{
  
  $post_data= '{"apptrebook_input":null,"status_input":null,"apptdetail":{"User":"Datacomp","Password":"Health@1234","VisitType":"'.$query[0]->homevisit.'","CustomerFirstName":"'.$query[0]->FirstName.'","CustomerLastName":"'.$query[0]->FirstName.'","Address":"'.$query[0]->FlatDetails.','.$query[0]->StreeDetails.','.$query[0]->City.'","Landmark":"'.$query[0]->Landmark.'","Gender":"'.$query[0]->Gender.'","Pincode":"'.$query[0]->PinCode.'","Mobile":"'.$query[0]->Mobile.'","Email":"'.$query[0]->EmailID.'","FBACode":"'.$query[0]->FBAId.'","PackCode":"'.$query[0]->packcode.'","ProviderCode":"'.$req->txtprovider.'","ApptDate":"'.$query[0]->PickUpDate.'","ApptTime":"'.$query[0]->PickUptime.'","SlotId":0},"pack_details":null,"slot_inputdata":null,"provider_data":null,"pack_param":null}';
     //$post_data=json_encode($data);
    //print_r($post_data);
                $result=$this->call_json_data_api('http://www.healthassure.in/Products/HAMobileProductService.asmx/bookAppt',$post_data);
                $http_result=$result['http_result'];
                $error=$result['error'];
                $st=str_replace('"{', "{", $http_result);
                $s=str_replace('}"', "}", $st);
                $m=$s=str_replace('\\', "", $s);
                $update_user='';
                $obj = json_decode($m);
               
            $isupdate=DB::select('call Usp_updatehealthassuredbooking(?,?,?,?)',array(

               $obj->d->CaseID,
               $req->txtprovider,
               $req->txtproviderdccode,
               $req->txtID

              ));

            $packdetails =  array('healthplan'=>$req->txtPackName,'mrp'=>$req->txtMRP,'offerprice'=>$req->txtOfferPrice,'lab'=>$req->txtprovidername,'LabAddress'=>$req->txtprovideraddress,'homevisit'=>$req->txthomevisit,'fasting'=>$req->txtfasting,'url'=>$obj->d->PayURL);
           //print_r($packdetails);exit();
            try{
    $data=array("pack_param"=> array("username"=>"Datacomp","pass"=>"Health@1234","packcode"=>191));
 
     $post_data=json_encode($data);
    // print_r($post_data); exit();
                $result=$this->call_json_data_api('http://www.healthassure.in/Products/HAMobileProductService.asmx/PackParam',$post_data);
                $http_result=$result['http_result'];
                $error=$result['error'];
                $st=str_replace('"{', "{", $http_result);
                $s=str_replace('}"', "}", $st);
                $m=$s=str_replace('\\', "", $s);
                $update_user='';
                $obj = json_decode($m);
               // print_r($m); exit();
                
              
               

                   if($obj->d->status='Success'){

                         $respon=($obj->d->lstPackParameter);
                    }else{
                         $respon=0;
                    }
                    //print_r($respon); exit();
    }
    catch (Exception $e){
        return $e;    
     }

              return view('order-summary',['query'=>$query,'respon'=>$respon])->with($packdetails);


          

    }
    catch (Exception $e){
        return $e;    
     }

//print_r($arra); exit();
          
   
}
}
