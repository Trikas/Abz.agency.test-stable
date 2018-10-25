<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Facades\genName;

class SearchData extends Controller
{
	function search (Request $request){
		$search_input = $request->input('input_search');
		$user = DB::table('personal')
		->where('last_name','like','%'.$search_input.'%')
		->orWhere('first_name','like','%'.$search_input.'%')
		->orWhere('father_name','like','%'.$search_input.'%')
		->orWhere('position','like','%'.$search_input.'%')
		->orWhere('first_day','like','%'.$search_input.'%')
		->orWhere('salary','like','%'.$search_input.'%')
		->get();



		
		$response = view('search_data', ['user'=>$user, 'count'=>count($user)]);

		return $response;
	}


}

    //

