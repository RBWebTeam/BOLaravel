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
class ncdcampaignController extends CallApiController {

  public function ncdcampaignview(){
    $campign = DB::select("call get_ncd_campaign_data()");
    return view('ncd-campaign',['campign'=>$campign]); 
  }


  public function insertncafbadoc(Request $req){  

           $Doc1=$this->fileupload_fn($req->file('Doc1'),$req->hiddenguid);
           $Doc2=$this->fileupload_fn($req->file('Doc2'),$req->hiddenguid);
           $Doc3=$this->fileupload_fn($req->file('Doc3'),$req->hiddenguid);
           $Doc4=$this->fileupload_fn($req->file('Doc4'),$req->hiddenguid);       
        if ($Doc1!='0'){
          DB::select('call ncd_doc_insert(?,?,?,?)',array(
            'Doc1',
            $Doc1,
            $req->fbaviewhiddenid,
            $req->hiddenguid));
        }
         if ($Doc2!='0'){
          DB::select('call ncd_doc_insert(?,?,?,?)',array(
            'Doc2',
            $Doc2,
            $req->fbaviewhiddenid,
            $req->hiddenguid));
        }
        if ($Doc3!='0'){
          DB::select('call ncd_doc_insert(?,?,?,?)',array(
            'Doc3',
            $Doc3,
            $req->fbaviewhiddenid,
            $req->hiddenguid));
        }
        if ($Doc4!='0'){
          DB::select('call ncd_doc_insert(?,?,?,?)',array(
            'Doc4',
            $Doc4,
            $req->fbaviewhiddenid,
            $req->hiddenguid));
        }
        Session::flash('message', 'Document Uploded successfully');
   return redirect('ncd-campaign');
 }
 public function fileupload_fn($image,$hiddenguid){       
  $declva='';
  if($image!=''){
    $name = time().'.'.$image->getClientOriginalName();
    $public_path = 'upload/NCD_Doc/'.$hiddenguid;
    $this -> make_dynamic_folder($public_path);
            $destinationPath = public_path($public_path); //->save image folder 
            $image->move($destinationPath, $name);
            $declva=$name;
          }else
          {
            $declva='0';
          } 

          return $declva;
        }


        public function make_dynamic_folder($public_path){
          $path = public_path($public_path);
          if (!file_exists($path)){
           mkdir($path , 0777, true);  //the folder created in documents folder successfully
      } else {   //The directory  exists.
       // echo 'directory exist';
      }

    }


    public function viewncadoc($id){ 
      $Response_array = [];
      //print_r($id);exit();
    //print_r($req->all()); exit(); 
      $viewimage= DB::select('call nca_doc_view (?)',array($id));
      foreach($viewimage as $val ){
        $Response_array[$val -> id][$val -> documentname] = $val -> documentpath;
    //$Response_array[$val -> id]['documentpath'] = $val -> documentname;
      }
      return json_encode($Response_array);
    }

    public function insert_ncd_status(Request $req){                                        
                  //print_r($req->all()); exit();
      DB::select('call ncd_status_update(?,?,?)',array(
        $req->hiddenid,                
        $req->ddltype,  
        $req->statuscomment,  
      ));


    }
    public function getncdstatus($id){
    //print_r($req->all()); exit();  
      $data=[];
      $data= DB::select('call ncd_current_status(?)',array($id));
      return json_encode($data);
           //return view('ncd-campaign',['data'=>$data]); 
    }



  }
