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
              $m=$this->responsejson();
              $obj = json_decode($m);
              return $m;
                    }
    catch (Exception $e){
        return $e;    
     }
}

private function responsejson(){
return '{
    "d": {

        "__type": "HealthProduct.MobileDAL.ServiceProviderList",
        "service_provider_listdata": [
            {
                "provider_id": "6645",
                "provider_name": "SRL Wellness Centre - Goregaon",
                "address": "Prime Square Building, Plot no.1, Gaiwadi Industrial Estate, Near Kamat Club & Patel Auto, S V Road, Goregaon (West)-0km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": "SRL"
            },
            {
                "provider_id": "6598",
                "provider_name": "Healthspring - Andheri",
                "address": "Shree krishna, G Wing - 104, 1st Floor, Opp. Laxmi Industrial Estate, Near Fun Republic, New link Road, Oshiwara, Andheri (W)-1km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": "Healthspring"
            },
            {
                "provider_id": "3866",
                "provider_name": "Suburban Diagnostics I Pvt Ltd - Malad",
                "address": "104  1st Floor , Bhoomi Castle, Opp Goregaon Sports Club , Malad West-2km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": ""
            },
            {
                "provider_id": "3907",
                "provider_name": "Riddhi Vinayak Critical Care and Cardiac Centre",
                "address": "Pushpachandra Apts 559/1,  Riddhi Vinayak Temple Lane,,  S.V road, Malad (W)-2km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": ""
            },
            {
                "provider_id": "7552",
                "provider_name": "Healthspring - Malad W",
                "address": "Unit no 102 1st floor , Palm court complex link road, Above D Mart, Malad W-2km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": "Healthspring"
            },
            {
                "provider_id": "6630",
                "provider_name": "Lifecare Diagnostics and Research Pvt Ltd",
                "address": "1st Floor, Sunshine, Opp. Shastri Nagar, Lokhandwala Complex, Andheri (W), -3km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": ""
            },
            {
                "provider_id": "9040",
                "provider_name": "Seabird Health Foundation - Andheri West",
                "address": "C-603/604, Remi Discot,, off - Veera Desai Rd, , Andheri (West)-3km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": ""
            },
            {
                "provider_id": "3614",
                "provider_name": "Suburban Diagnostic Centre - Andheri W",
                "address": "2nd Floor,Aston Tower, Sundarvan Complex,, Shastri Nagar,, Andheri (W)-3km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": ""
            },
            {
                "provider_id": "6606",
                "provider_name": "Healthspring - Goregaon E",
                "address": "Shop no.1 & 2, 1st floor, Onkar CHS Ltd, Shivdham Sankul, Gen AK Vaidy Marg,, Opp Oberoi Mall, Goregaon East-4km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": "Healthspring"
            },
            {
                "provider_id": "3611",
                "provider_name": "Suburban Diagnostics I Pvt Ltd - Kandivali E",
                "address": "ROW HOUSE NO.3,AANGAN,, THAKUR VILLAGE,, Opp Thakur college of science and commerce, Kandivali (E)-6km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": ""
            },
            {
                "provider_id": "4164",
                "provider_name": "Seabird Health Foundation - Powai",
                "address": "Sea Bird Medicare Powai, 102-104, Gateway Plaza, Central Avenue Road, Hiranandani Gardens, Opp Powai Plaza-9km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": ""
            },
            {
                "provider_id": "6693",
                "provider_name": "Healthspring - Powai",
                "address": "Unit #205, 205A & 205B, 2nd floor, Galleria Building,, Hiranandani Road,, Powai-9km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": "Healthspring"
            },
            {
                "provider_id": "7377",
                "provider_name": "Healthspring - Mulund",
                "address": "Shop Nos. 1, 2 AND 3, Ground Floor Munish Co-operative Housing Society Ltd, LBS Marg, Opp. Johnson & Johnson Factory, Mulund (West)-11km",
                "city": "Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": "Healthspring"
            },
            {
                "provider_id": "8795",
                "provider_name": "Healthspring - Thane Panchpakhadi",
                "address": "Ground Floor, B-Wing, Mohan Heritage,, Almedia Road, Panchpakhadi -14km",
                "city": "Thane",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": "Healthspring"
            },
            {
                "provider_id": "7818",
                "provider_name": "SRL Wellness Center - Thane",
                "address": "SRL Limited, SK Tower, Hariniwas, LBS Marg , Thane West-15km",
                "city": "Thane",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": "SRL"
            },
            {
                "provider_id": "8858",
                "provider_name": "Way 2 Health Diagnostics - Ghansoli",
                "address": "Shop No. 2, Plot No. 528, Balaji CHS, Sec. 4, Near Mahanagar Co-op Bank, Ghansoli-18km",
                "city": "Navi Mumbai",
                "state": "Maharashtra",
                "visittype": "CV",
                "DCCode": ""
            }
        ],
        "status_code": 200,
        "status": "Success",
        "message": "Success"
    }
}';
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
