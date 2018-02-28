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


        $recfn='';

                  $menu_group_id=0;
                   if(isset($req->id)){
                    $menu_group_id=$req->id;
                  }else{
                         return Back();
                  }

                   

                     

                    $menu_group=DB::table('menu_group_master')->select('id','name')->get();
                    $menu=DB::table('menu_master')->select('id','name','parent_id')->get();
                    $m_p=DB::table('menu_mapping')->where('menu_group_id','=',$menu_group_id)->get();   

 
                       $recfn=$this->recursiveFN($menu_group_id,$id=0);

   
                    return view('menu_mapping',['menu_group'=>$menu_group,'menu'=>$menu,'menu_group_id'=>$menu_group_id,'m_p'=>$m_p,'recfn'=>$recfn]);
    }



public function recursiveFN($menu_group_id,$parent_id=0){
                          
 


 
                      $menu='';
                      $sql='';
                      $m_p='';
                      $is_select='';
                      if($parent_id==0){
           // $sql=DB::table('menu_master')->select('id','name','parent_id')->where('parent_id','=',0)->get();

                      $sql=DB::select('call sp_recursive_mapping(?,?)',array(0,$menu_group_id));
             
                     }else{
           // $sql= DB::table('menu_master')->select('id','name','parent_id')->where('parent_id','=',$parent_id)->get();  
                         $sql=DB::select('call sp_recursive_mapping(?,?)',array($parent_id,$menu_group_id));
             
                     }
  
 
                    foreach ($sql as $key => $value) {
                           
                        if($value->menu_group_id==$menu_group_id){
                          $menu.='<li><label><input   type="checkbox" name="menu_id[]" checked value="'.$value->id.'" >'.$value->name.' </label>';
                     }else{
                        $menu.='<li><label><input   type="checkbox" name="menu_id[]"  value="'.$value->id.'"   >'.$value->name.' </label>';
                       }
                              
                       
                     
                       $menu.='<ul  class="sub-menu" >'.$this->recursiveFN($menu_group_id,$value->id).'</ul>';
                       
                       $menu.='</li>';
                        
                    }




                    return $menu;


}


public function chield_id($parent_id){

return DB::table('menu_master')->select('id','name','parent_id')->where('parent_id','=',$parent_id)->get();

}

public function menu_group_select(Request $req){
$menu=DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id')->where('menu_group_id','=',$req->ID)->get();
     return $menu;
}

    public function menu_mapping_save(Request $req){


 
                 $val =Validator::make($req->all(), 
                 [
                 'menu_group_id' =>'required|not_in:0',
                 'menu_id' =>'required|not_in:null',
                ]);

           if ($val->fails()){
              return Back()->withErrors($val)->withInput();
           }else{
                     
                      $menu_group_id= $req->menu_group_id;
                      $tabel=DB::table('menu_mapping');
                    if ($tabel->where('menu_group_id', '=', $menu_group_id)->count() > 0) {
                        DB::table('menu_mapping')->where('menu_group_id', '=',$menu_group_id)->delete();
                        }

                         foreach ($req->menu_id as $key => $val) {  
                           $tabel->insert(['menu_group_id'=>$menu_group_id,'menu_id'=>$val]);
                          } 
                    
                       
                     return Back();
        }
    }



    public function menu_list_select(Request $req){

          $menu=DB::table('menu_master')->select('id','name','parent_id')->get();


          echo json_encode($menu);

    }


    public function menu_list_add(Request $req){  
           
             $parent_id=$req->parent_id?$req->parent_id:0;
             $level_name=$req->level_name?$req->level_name:0;
             $val =Validator::make($req->all(), 
                 [
                 'menu_name' =>'required',
                 'url_link' =>'required',
                ]);

           if ($val->fails()){
              return Back()->withErrors($val)->withInput();
           }else{
              
               DB::table('menu_master')->insert(['name'=>$req->menu_name,'url_link'=>$req->url_link,'lvl'=>$level_name,'parent_id'=>$parent_id,'seq'=>$req->sequence]);
               return Back();
                
           }
    }


    public function menu_test(Request $req){
          $menu=DB::select('call sp_runtime_menu()');
         //$menu=DB::table('menu_master')->select('id','name','parent_id')->get(); 
        return view('test',['pro'=>$menu]);
    }

    public function menu_group(Request $req){

       $menu_group=DB::table('menu_group_master')->select('id','name')->get();
        return view('menu_group',['menu_group'=>$menu_group]);
    }


    public function menu_group_save(Request $req){

           DB::table('menu_group_master')->insert(['name'=>$req->menu_group]);
           return 0;
    }
}
