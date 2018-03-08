<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckRole
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

                $sql=\DB::table('view_user_right_group')->select('id','name','menu_group_id','url_link','parent_id','lvl')->where('menu_group_id','=',Session::get('usergroup'))->where('lvl','=',0)->orderBy('id', 'asc')->get()->toArray();


if (array_key_exists(Session::get('usergroup'),$sql)){
  return $next($request);
  }else{
   return redirect('dashboard');
  }

 
    
        
    }
}
