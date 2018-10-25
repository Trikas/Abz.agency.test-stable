<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\User;


class IndexPage extends Controller
{
    function show(){

    	$arr = DB::table('personal')->get();
        $first_user_id = DB::table('personal')->first();

		foreach ($arr as  $value) {
			$tree_child[$value->id_parent][$value->id]=(array)$value;
		}
        // dd($tree_child);
        if(isset($tree_child)){
        $tree = $this->build_tree($tree_child, $first_user_id->id_parent);
        return view('index',['tree'=>$tree]);
     
        }
		return view('index',['tree'=>'error']);
		}

	function build_tree($arr_tree,$parent_id, $only_parent = false){
    if(is_array($arr_tree) and isset($arr_tree[$parent_id])){
        $tree = '<ul>';
        if($only_parent==false){
            foreach($arr_tree[$parent_id] as $arr){
            	
                $tree .= '<li>'.$arr['position'].' #'.$arr['last_name'].' #'.$arr['id_parent']." ".$arr['id'];
                $tree .=  $this->build_tree($arr_tree,$arr['id']);
                $tree .= '</li>';
                
            }
        }elseif(is_numeric($only_parent)){
            $arr = $arr_tree[$parent_id][$only_parent];
            $tree .= '<li>'.$arr['position'].' #'.$arr['id_parent'];
            $tree .=  $this->build_tree($arr_tree,$parent_id);
            $tree .= '</li>';
        }
        $tree .= '</ul>';
    }
    else return null;
    return $tree;
}
    
}

