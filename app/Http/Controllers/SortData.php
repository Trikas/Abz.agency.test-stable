<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SortData extends Controller
{
	function sort($how_sort, $whom_sort){

		if ($how_sort=='desk'){
			$pers = DB::table('personal')
					->orderBy($whom_sort, $how_sort)
					->paginate(20);		
		}
		elseif($how_sort=='ask'){
			$pers = DB::table('personal')
					->orderBy($whom_sort)
					->paginate(20);
			
		}
      	return view('all_pers', ['user'=>$pers]);
	
	}

		
}
   			




