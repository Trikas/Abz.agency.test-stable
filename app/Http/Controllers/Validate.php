<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\UserCRUD;

class Validate extends Controller
{
   function valid(Request $request, $id){

         $crud = new UserCRUD;
   		$x = $this->validate($request,[
   			'last_name'=>'required|string|max:255',
   			'first_name'=>'required|string|max:255',
   			'father_name'=>'required|string|max:255',
   			'position'=>[
   				'required',
   				Rule::in(['президент компании','генеральный директор','директор филиала','зам.директора филиала','управляющий персоналом','рабочий','первый подручный рабочего','первый подручный подручного','повар первого подручного', 'помощник повара первого подручного']),
   			],
   			'first_day'=>'required|date_format:"j.m.Y"',
   			'salary'=>'required|numeric'

   		]);
    
		if (!empty($x)&&$id!=0){
         $crud->update($request, $id);
      }
      if($id==0){
         $crud->create($request);
         }
      }
		
}

 
