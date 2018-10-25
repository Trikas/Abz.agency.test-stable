<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\DB;

class UserCRUD extends Controller
{
	function get_position_id($position){
		switch ($position) {
			case 'президент компании':
			return 5;
			break;
			case 'генеральный директор':
			return 6;
			break;
			case 'директор филиала':
			return 7;
			break;
			case 'зам.директора филиала':
			return 8;
			break;				
			case 'управляющий персоналом':
			return 9;
			break;
			case 'рабочий':
			return 10;
			break;
			case 'первый подручный рабочего':
			return 11;
			break;
			case 'повар первого подручного':
			return 12;
			break;
			case 'помощник повара первого подручного':
			return 13;
			break;				
			default:
			return 'error';
			break;
		}
	}
	function get_position_val($position){
		switch ($position) {
			case 5:
			return'президент компании';
			break;
			case 6:
			return'генеральный директор';
			break;
			case 7:
			return 'директор филиала';
			break;
			case 8:
			return 'зам. директора филиала';
			break;				
			case 9:
			return 'управляющий персоналом';
			break;
			case 10:
			return 'рабочий';
			break;
			case 11:
			return 'первый подручный рабочего';
			break;
			case 12:
			return 'повар первого подручного';
			break;
			case 13:
			return 'помощник повара первого подручного';
			break;				
			default:
			return 'error';
			break;
		}
	}
	function personal_id($parent_id){
		$var = DB::table('personal')
		->where('position_value', $parent_id)
		->get();

		if($var->count()!=0){
			return $var[rand(0, count($var)-1)]->id;
		}   
		return 0;

	}
	function create($request){
		$parent_id = 0;
		$position_value_id = $request->get(('position'));
		if ($this->get_position_id($position_value_id)!=5){
			$parent_id = $this->personal_id($this->get_position_id($position_value_id)-1);
		}

		if($this->empty_parent($this->get_position_id($position_value_id))) {
			$user = new User;
			$user->last_name=$request->get('last_name');
			$user->first_name=$request->get('first_name');
			$user->father_name=$request->get('father_name');
			$user->position=$request->get('position');
			$user->position_value=$this->get_position_id($request->get('position'));
			$user->id_parent=$parent_id;
			$user->first_day=$request->get('first_day');
			$user->salary=$request->get('salary');
			$user->save();
			echo "Успех! Данные успешно внесены";
			
		}

	}
	function update ($request,  $id){

		$user = User::find($id);
		
		$user->last_name=$request->get('last_name');
		$user->first_name=$request->get('first_name');
		$user->father_name=$request->get('father_name');
		$user->position=$request->get('position');
		$user->first_day=$request->get('first_day');
		$user->salary=$request->get('salary');
		$user->save();

		echo "Успех! Данные пользователя обновлены";

	} 
	function delete($id){
		$passport = User::find($id);
		$passport->delete();

	}

	function empty_parent($position_value){
		$parent = DB::table('personal')
		->where('position_value', $position_value-1)
		->get();
		
		if($parent->count()!=0||$position_value==5){
			return true;
		}
		else{
			echo 'Ошибка!Не возможно добавить должность <strong>'.$this->get_position_val($position_value).'</strong> сначала нужно добавить <strong>'.$this->get_position_val($position_value-1).'</strong>';
		}
	}

	

}
