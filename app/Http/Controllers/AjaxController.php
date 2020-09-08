<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    public function index($search){
        $search = explode(" ", $search);
        $pita = FALSE;
        $sql = "SELECT * FROM project WHERE ";
        foreach ($search as $key) {
            if(ctype_alnum($key)){
                $sql .= "theme LIKE '%".$key."%' AND ";
                $pita = True;
            }
        }
        if($pita){
        $sql = rtrim($sql,'AND ');
        $text = DB::select($sql);   
        return response()->json($text,200);
        } else{
            return redirect()->back();
        }
    	return response()->json(array('sms'=>$sms),200);
    }
}