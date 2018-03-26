<?php

namespace App\Http\Controllers;
use Response;
use Request;
use Session;
use api_url;
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





               public function  menu_sidebar(){

 
                  return  $this->recurtionfn();

               }


               public function   recurtionfn($parent_id=0){  
                     
                     $menu='';
                      $sql='';
                     if($parent_id==0){
                 $sql=\DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id','lvl')->where('menu_group_id','=',Session::get('usergroup'))->where('parent_id','=',0)->get();
                     }else{
                    $sql=\DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id','lvl')->where('menu_group_id','=',Session::get('usergroup'))->where('parent_id','=',$parent_id)->get();
                     }


                    foreach ($sql as $key => $value) {

                      if($value->url_link=="#"){
                         
                          $menu.='<li><label class="tree-toggle nav-header"><a href="'.$value->url_link.'"><span class="sp-nav"><img src="images/icon/home.png"></span>&nbsp;&nbsp; '.$value->name.'</a></label>';
                      }else{
                           $menu.='<li><label class="tree-toggle nav-header"><a href="#"><span class="sp-nav"><img src="images/icon/home.png"></span>&nbsp;&nbsp; '.$value->name.'</a></label>';
                      }

                       $menu.='<ul class="nav nav-list tree">'.$this->recurtionfn($value->id).'</ul>';
                       
                       $menu.='</li>';
                        
                    }




                    return $menu;


                           
               }




               public function user_right_group_menu(){


                 return $sql=\DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id','lvl')->where('menu_group_id','=',Session::get('usergroup'))->where('lvl','=',0)->orderBy('id', 'asc')->get();

               }
}
