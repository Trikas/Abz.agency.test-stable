<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPanel extends Controller
{
    function show(){
    	  $pers = DB::table('personal')->paginate(20);

      return view('admin_side.admin', ['user'=>$pers]);
   

    }//
}
