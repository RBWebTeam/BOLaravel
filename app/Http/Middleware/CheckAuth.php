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
         $sql=\DB::table('menu_master')->select('id','name','menu_group_id')->where('menu_group_id','=',1)->get();
        \Menu::make('MyNavBar', function ($menu) use($sql) {
           foreach ($sql as $key => $value) {
                 $menu->add($value->name,'dashboard')->data('color', 'red');;
            } 
       
        // $menu->add('About', 'about');
        // $menu->add('Services', 'services');
        // $menu->add('Contact', 'contact');
    });

    	 	return $next($request);
    	 } 


        
    }
}
