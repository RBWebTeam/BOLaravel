<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

    	 if(!$request->session()->exists('emailid')){
           
           return redirect('/');
    	 }else{
         $sql=\DB::table('menu_master')->select('id','name','menu_group_id','url_link')->where('menu_group_id','=',2)->get();
        \Menu::make('MyNavBar', function ($menu) use($sql) {
           foreach ($sql as $key => $value) {
                //$menu->add($value->name,'dashboard')
                $menu->add($value->name,array('url'  =>$value->url_link,  'class' => 'nav-item'))
               ->prepend('<span class="sp-nav"><img src="images/icon/setting-icon.png"></span>&nbsp;&nbsp;');


            } 
     
    });

    	 	return $next($request);
    	 } 


        
    }
}
