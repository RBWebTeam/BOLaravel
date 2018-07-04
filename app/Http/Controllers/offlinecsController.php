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
class offlinecsController extends Controller
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
       return view('offlinecs',['Genins'=>$Genins,'lifeins'=>$lifeins,'health'=>$health,'city'=>$city,'fba'=>$fba,'productmgr'=>$productmgr,'productexe'=>$productexe,'Executive'=>$Executive,'Executive1'=>$Executive1]);
	}
	public function getstate($cityid)
  { 
		 
		 $state=DB::select("call Usp_get_state_on_city($cityid)");
		 return json_encode($state);

	}

	 public function insertofflinecs(Request $req)
    {
	 	
              DB::statement('call Usp_insert_motor_offlinecs(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
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
              $req->ddlInsurer,
              $req->ddlpayment,
              $req->txtutrnomotor,
              $req->txtbankmotor,
              $req->txtexecutivename,
              $req->txtexecutivename1,
              $req->txtexeProductname,
              $req->txtmgrProductname));      
      
    }
    public function inserthealthofflinecs(Request $req)
        {
    
              DB::statement('call Usp_insert_health_offlinecs(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
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
              $req->ddlInsurer,
              $req->ddlpayment,
              $req->txtutrnohealth,
              $req->txtbankhealth,
              $req->txtexecutivename,
              $req->txtexecutivename1,
              $req->txtexeProductname,
              $req->txtmgrProductname,
              $req->txtPreexisting,
              $req->txtmedicalrp,
              $req->dllpremium));      
      
    }
     public function insertlifeofflinecs(Request $req)
        {
    
              DB::statement('call Usp_insert_life_offlinecs(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
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
              $req->ddlInsurer,
              $req->ddlpayment,
              $req->txtutrno,
              $req->txtbank,
              $req->txtexecutivename,
              $req->txtexecutivename1,
              $req->txtexeProductname,
              $req->txtmgrProductname,
              $req->ddlnoofpolicy,
              $req->txtmedicalcase));      
      
    }

    public function uploadmotordoc(Request $req)
    {

   
           $image = $req->file('filerc');
           print_r($image); exit();
           $name ="";
           if($image)
           {
             $name = time().'.'.$image->getClientOriginalName();
             $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
             $image->move($destinationPath, $name);
           } 
   
         return "test";

    }

}