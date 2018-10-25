<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablePersonal extends Controller
{
    function show (){

      $pers = DB::table('personal')->paginate(20);

      return view('all_pers', ['user'=>$pers]);


    }


 
}

