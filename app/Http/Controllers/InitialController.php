<?php

namespace App\Http\Controllers;
use Response;
use Request;
use Session;
use api_url;
use Illuminate\Support\Facades\URL;
class InitialController extends Controller
{

      public static  $api_url="http://qa.mgfm.in/";
      
      public function send_success_response($message,$status,$data){
      	
      	$res = array('message' =>$message ,'status'=>$status,'status_code'=>1,'MasterData'=>$data );
      	return Response::json($res);
      }
      public function send_failure_response($message,$status,$data){

      	$res = array('message' =>$message ,'status'=>$status,'status_code'=>0,'MasterData'=>$data );
      	return Response::json($res);
      }

      public function chield_id($parent_id,$group_id){
                $parent=\DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id','lvl')->where('menu_group_id','=',$group_id)->where('parent_id','=',$parent_id)->get();
      
                     return $parent;

               }





               // public function  menu_sidebar(){

 
               //    return  $this->recurtionfn();

               // }


 public function user_right_group_menu(){


                 // return $sql=\DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id','lvl')->where('menu_group_id','=',Session::get('usergroup'))->where('lvl','=',0)->orderBy('id', 'asc')->get();


                return    $this->recurtionfn(Session::get('usergroup'),0);

               }


              
                public function   recurtionfn($usergroup,$parent_id=0){  
                     
                      $menu='';
                      $sql='';
                     if($parent_id==0){
                      $sql=\DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id','lvl')->where('menu_group_id','=',$usergroup)->where('parent_id','=',0)->get();
                     }else{
                    $sql=\DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id','lvl')->where('menu_group_id','=',$usergroup)->where('parent_id','=',$parent_id)->get();
                     }


                    foreach ($sql as $key => $value) {

                      if($value->url_link!="#"){
                          $menu.='<li><label class="tree-toggle nav-header"><a href="'.URL('/')."/".$value->url_link.'"><span class="sp-nav"> </span>&nbsp;&nbsp; '.$value->name.'</a></label>';
                      }else{
                           $menu.='<li  class="level1"><label class="tree-toggle nav-header"><a href="javascript:void(0)"><span class="caret"></span>&nbsp;&nbsp; '.$value->name.'</a></label>';
                      }

                       $menu.='<ul class="nav nav-list tree">'.$this->recurtionfn($usergroup,$value->id).'</ul>';
                       
                       $menu.='</li>';
                        
                    }




                    return $menu;


                           
               }




              
}
