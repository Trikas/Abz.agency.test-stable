<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddPhoto extends Controller
{
    function add(Request $request){

    	$contents = $request->file();
    	dd($contents);
    }//
}
