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

class crmfbalistController extends CallApiController
{

	public function crmlist(Request $req){
  $crmlist=DB::select("call usp_load_crm_fba_bycities(12773)");
   return view('crm_fba_list',['crmlist'=>$crmlist]);

}


// CRM STATUS

				public function statuscrm($id){
					$crmstatus=DB::select("call usp_load_disposition()");
          $crmsubdi=DB::select("call usp_load_sub_disposition(4,'Do not call again')");

					$data = DB::select("call usp_load_fba_individual(?)",array($id));
					return view ('crm_status',['crmstatus'=>$crmstatus,'crmsubdi'=>$crmsubdi,'data'=>$data]);
}


 					    public function crminsert(Request $req){      

         			$demo = DB::select('call usp_crm_insert(?,?,?,?,?,?)',array(
          			$req->sfbaid,
          			$req->hddlcity,
          			$req->subdispo,
          			$req->fodate,
          			$req->codate,
          			$req->srmrk,

         

  ));
      }


}
   