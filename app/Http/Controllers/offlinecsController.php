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
       return view('offlinecs',['Genins'=>$Genins,'lifeins'=>$lifeins,'health'=>$health,'city'=>$city,'fba'=>$fba]);
	}
	public function getstate($cityid)
	{ 
		 
		 $state=DB::select("call Usp_get_state_on_city($cityid)");
		 return json_encode($state);

	}

	 public function insertofflinecs(Request $req)
    {
	 	print_r($req->all()); exit();
           
              $rccopy = $req->file('filerc');
              $Fitness = $req->file('fileFitness');
              $puc = $req->file('filePUC');
              $breakrp = $req->file('filebreakrp');
              $Cheque = $req->file('fileCheque');
              $other = $req->file('fileother');
              $ProposalForm = $req->file('fileProposalForm');
              $KYC = $req->file('fileKYC');
              $rccopyname ="";
              $Fitnessname="";
              $pucname="";
              $breakrpname="";
              $Chequename="";
              $othername="";
              $ProposalFormname="";
              $KYCname="";
              if($rccopy){
              $rccopyname = time().'.'.$rccopy->getClientOriginalName();
               $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
               $rccopy->move($destinationPath, $rccopyname);
              }
              if($Fitness){
              $Fitnessname = time().'.'.$Fitness->getClientOriginalName();
               $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
               $Fitness->move($destinationPath, $Fitnessname);
              }
              if($puc){
              $pucname = time().'.'.$puc->getClientOriginalName();
               $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
               $puc->move($destinationPath, $pucname);
              }
              if($breakrp){
              $breakrpname = time().'.'.$breakrp->getClientOriginalName();
               $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
               $breakrp->move($destinationPath, $breakrpname);
              }
              if($Cheque){
              $othername = time().'.'.$Cheque->getClientOriginalName();
               $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
               $Cheque->move($destinationPath, $othername);
              }
              if($other){
              $othername = time().'.'.$other->getClientOriginalName();
               $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
               $other->move($destinationPath, $othername);
              }
              if($ProposalForm){
              $ProposalFormname = time().'.'.$ProposalForm->getClientOriginalName();
               $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
               $ProposalForm->move($destinationPath, $ProposalFormname);
              }
               if($KYC){
              $KYCname = time().'.'.$KYC->getClientOriginalName();
               $destinationPath = public_path('upload/offlinecs/'); //->save image folder 
               $KYC->move($destinationPath, $KYCname);
              }
              DB::select('call Usp_insert_offlinecs(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
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
              $rccopyname ,
              $Fitnessname,
              $pucname,
              $breakrpname,
              $Chequename,
              $othername,
              $req->txtPreexisting,
              $req->txtmedicalrp,
              $req->dllpremium,
              $ProposalFormname,
              $KYCname,
              $req->ddlnoofpolicy,
              $req->txtmedicalcase
               ));
             
               return redirect('offlinecs');
        
      
    }
}