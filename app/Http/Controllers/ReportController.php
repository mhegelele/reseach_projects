<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Input;
use Validator;
use Redirect;
use DB;
use PDF;
class ReportController extends Controller
{

public function index(){

    if(Auth::check()){
                     $proje = DB::table('project')
                                 ->select('project.*')
                                  ->where('project.status','=','approved')
                                  ->where('project.level', '!=',  1)
                                  ->groupby('centre')
                                 ->paginate(10);

                      

                   $ppending = DB::table('project')
                    ->select(DB::raw('count(*) as progress'))
                         
                         ->where('level', '!=',  1)
                         ->where('status','pending')
                    ->get();

         $papproved = DB::table('project')
                    ->select(DB::raw('count(*) as approved'))
                        
                         ->where('level', '!=',  1)
                         ->where('status','approved')
                    ->get();
          
        $research = DB::table('project')
                   ->select(DB::raw('count(*) as totalproject'))
                ->where('project.status','=','approved')
                ->where('project.level', '!=',  1)
                ->get(); 

        $project = DB::table('project')
                 ->select('title')
                 ->where('project.status','=','approved')
                ->where('project.level', '!=',  1)
                ->paginate(10);     

return view('/reports/report')->with(['research'=>$research])->with(['proje'=>$proje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])
->with(['project'=>$project])->with('i', (request()->input('page', 1) - 1) * 5);
            
        }else{
            return redirect()->back();
        }
   
}
     
      function viewbycentre($id){

         $ppendings = DB::table('project')
                     ->select('project.*') 
                     ->where('project.centre','=',$id)
                    ->where('level', '!=',  1)
                    ->where('status','approved')
                    ->paginate(10);

         $papproved = DB::table('project')                    
                         ->where('level', '!=',  1)
                         ->where('status','approved')
                         ->get();

        $ppending = DB::table('project')
                    ->select(DB::raw('count(*) as progress'))
                         
                         ->where('level', '!=',  1)
                         ->where('status','pending')
                    ->get();

         $papproved = DB::table('project')
                    ->select(DB::raw('count(*) as approved'))
                        
                         ->where('level', '!=',  1)
                         ->where('status','approved')
                    ->get();
            return view('/reports/view', compact('id'))->with(['ppendings'=>$ppendings])->with(['papproved'=>$papproved])
            ->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])->with('i', (request()->input('page', 1) - 1) * 5);
}
 
    public function pdfgenerate(Request $request)
    {
        $project = DB::table("project")
         ->select('title')
      
                 ->where('project.status','=','approved')
               
          ->where('project.level', '!=',  1)
              
                 ->get();
        
view()->share('project',$project);
        if($request->has('download')){
            $pdf = PDF::loadView('reports/pdf');
            return $pdf->download('Overrall Research Project Report.pdf');
        }


        return view('pdf');
    }
   public function centrePDF(Request $request, $id)
    {
        $project = DB::table("project")
             ->select('title')
             ->where('project.centre','=',$id)
             ->where('project.status','=','approved')
             ->where('project.level', '!=',  1)
            ->get();
        
view()->share('project',$project);
         $pdf = PDF::loadView('reports/centre', compact('id'));
            return $pdf->download('Research Project Report.pdf');
           return view('reports/centre')->with(['project'=> $project]);
        }


      
    
   

}
