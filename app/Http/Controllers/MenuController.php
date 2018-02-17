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
              	'menu_group_id'=>$req->menu_group_id,
              	);
                        
                $query=DB::table('menu_master')->insert($arr);
                $error=0;
               }catch (Exception $e){  $error=1;  }
              return $error;
    }
}
