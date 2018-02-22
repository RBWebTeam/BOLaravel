<?php

namespace App\Http\Controllers\RM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RegionalManagerControllar extends Controller
{
      public function regional_manager(){
            
            $fbamaster=DB::table('FBAMast')->get();

      	    return view('rm',['fbamaster'=>$fbamaster]);
      }
}
