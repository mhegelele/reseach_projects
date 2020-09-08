<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
class HomeController extends Controller
{

     
    public function loadHome()
    {

                $proje = DB::table('project')
                                 ->select('project.*')
                                // ->where("project.centre", Auth::user()->name) 
                                ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->paginate(10);

                      

                $ppending = DB::table('project')
                         ->select(DB::raw('count(*) as progress'))
                         // ->where("project.centre", Auth::user()->name)
                         ->where('level', '!=',  1)
                         ->where('status','pending')
                    ->get();

                $papproved = DB::table('project')
                         ->select(DB::raw('count(*) as approved'))
                                             ->where('level', '!=',  1)
                         ->where('status','approved')
                         ->get();
                 $c = DB::table('project as t1')
                ->join('project as t2','t2.centre', '=','t1.centre')
                ->select(DB::raw('count(*) AS cent, t2.centre'))
                ->where('t2.status','=','approved')
                ->where('t2.level', '!=',  1)
                ->groupBy('centre')
               ->orderBy('centre')
                ->get();

          $cents = DB::table('project')
                                 ->select('project.*')
                                 ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->get();

return view('/home')->with(['proje'=>$proje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])->with(['c'=>$c])
->with(['cents'=>$cents])->with('i', (request()->input('page', 1) - 1) * 5);
            
       
       
    }


 public function ajaxhome()
    {
        $c = DB::table('project as t1')
                ->join('project as t2','t2.centre', '=','t1.centre')
                ->select(DB::raw('count(*) AS cent, t2.centre'))
                ->where('t2.status','=','approved')
                ->where('t2.level', '!=',  1)
                ->groupBy('centre')
               ->orderBy('centre')
                ->get();

      
        return view('home3')->with(['c'=>$c]);
    }


     function dataTableList(Request $request){
        $search = $request->search_value;
        $length = $request->length;
        $draw = $request->draw;
        $publications =   DB::table('project')->select('project.*')->where('level', '!=',  1)->where('status','approved');
        if(!empty($search) && !is_null($search)){
            $publications->where('theme','like',"%{$search}%")->orWhere('theme', 'like',"%{$search}%")->orWhere('background', 'like', "%{$search}%")->orWhere('summary', 'like', "%{$search}%")->orWhere('centre', 'like', "%{$search}%");
        }
        $totalRecords = $publications;
        $text = $publications->offset($request->start)->limit($request->length)->orderBy("pro_id","ASC")->get();
        $data = array();
      
        foreach($text as $d){
            $req = array("pro_id"=>$d->pro_id,"theme"=>$d->theme,"centre"=>$d->centre);
            array_push($data,$req);
        }
     
        $data_table = array(
            "draw"=>$request->draw,
            "recordsTotal"=>DB::table('project')->select('project.*')->where('status','=','approved')->where('level', '!=',  1)->count(),
            "recordsFiltered" =>  $totalRecords->count(),
            "data"=>$data
        );
        return json_encode($data_table);

    }



     public function search()
    {
        $query=request('search_text');
         $data = DB::table('project')
         ->where('title', 'like', '%'.$query.'%')
         ->orWhere('theme', 'like', '%'.$query.'%')
         ->orWhere('background', 'like', '%'.$query.'%')
         ->orWhere('summary', 'like', '%'.$query.'%')
          ->orWhere('centre', 'like', '%'.$query.'%')
        ->where('level', '!=',  1) 
        ->where('status','approved')
         ->orderBy('pro_id', 'asc')
         ->paginate(10);


         $c = DB::table('project as t1')
                ->join('project as t2','t2.centre', '=','t1.centre')
                ->select(DB::raw('count(*) AS cent, t2.centre'))
                ->where('t2.status','=','approved')
                ->where('t2.level', '!=',  1)
                ->groupBy('centre')
               ->orderBy('centre')
                ->get();



                $projes = DB::table('project')
                                 ->select('project.*')
                                 ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->get();

              return view('/home3')->with(['data'=>$data])->with(['c'=>$c])->with(['projes'=>$projes]);
    }
  
}
