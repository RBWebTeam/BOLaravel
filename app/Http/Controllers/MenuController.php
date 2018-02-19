<?php

namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Validator;
class MenuController extends Controller{
    

    public function menu_list(Request $req){
             $menu_group=DB::table('menu_group_master')->select('id','name')->get();
              $menu=DB::table('menu_master')->select('id','name')->get();
    	      return view('menu_list',['menu_group'=>$menu_group,'menu'=>$menu]);





    }


    public function menu_add(Request $req){
    	           $error=1;
                 try{
              $arr=array( 
              	'name'=>$req->menu,
              	'url_link'=>$req->url_link,
              	);
                        
                $query=DB::table('menu_master')->insert($arr);
                $error=0;
               }catch (Exception $e){  $error=1;  }
              return $error;
    }


    public function mapping(Request $req){
           
                    $menu_group=DB::table('menu_group_master')->select('id','name')->get();
                    $menu=DB::table('menu_master')->select('id','name')->get();
    	      return view('menu_mapping',['menu_group'=>$menu_group,'menu'=>$menu]);
    }


    public function menu_mapping_save(Request $req){

           
                 $val =Validator::make($req->all(), 
                 [
                 'menu_group_mapping' =>'required|not_in:0',
                 'mapping' =>'required|not_in:null',
                ]);

           if ($val->fails()){
              return Back()->withErrors($val)->withInput();
           }else{
                     
                    $menu_group_mapping= $req->menu_group_mapping;
                    $mapping=implode(',', $req->mapping);
                    DB::table('menu_mapping')->insert(['menu_group_id'=>$menu_group_mapping,'menu_id'=>$mapping]);
                     return Back();
        }
    }
}
