<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Publication;
use DB;


class ProjectController extends Controller
{
   //load home page
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
                         // ->where("project.centre", Auth::user()->name)
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
    
public function addproject(Request $request){

   $data = Input::except(array('_token','submit','name_objective','inst_name','publication', 'sponsor', 'fname', 'lname', 'sname', 'role' ));
       $sponsor = $request->input('sponsor');
       $publication = $request->input('publication');
       $title = $request->input('title');
       $centre = $request->input('centre');
       $theme = $request->input('theme');
       $background = $request->input('background');
       $objective = $request->input('objective');
       $methodology = $request->input('methodology');
       $name_objective = $request->input('name_objective');
       $budget = $request->input('budget');
         $inst_name = $request->input('inst_name');
       $duration = $request->input('duration');
       $summary = $request->input('summary');
       $date_of_report = $request->input('date_of_report');
        $fname = $request->input('fname');
         $lname = $request->input('lname');
          $sname = $request->input('sname');
           $role = $request->input('role');
$rule = array(
            'title'=>'required',
            'theme'=>'required',
            'centre'=>'required',
         
                        );

$validator = Validator::make($data,$rule);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
       DB::table('project')->insert(
                ['title'=>$title, 'centre'=>$centre, 'theme'=>$theme, 'background'=>$background,
                'objective'=>$objective, 'methodology'=>$methodology, 'budget'=>$budget, 'duration'=>$duration, 'summary'=>$summary, 'date_of_report'=>$date_of_report]
                );
                 $id = DB::getPdo()->lastInsertId();

 for ($z = 0; $z<sizeof($fname);$z++) {
                

   // codes inside the body of outer loop
   if($fname[$z] != ""){
                DB::table('investigator')->insert([
                    'p_id'=>$id,
                    'fname'=>$fname[$z], 
                    'lname'=>$lname[$z], 
                    'sname'=>$sname[$z], 
                    'role'=>$role[$z]                                                        
                    ]);
                }else{
                    echo "Error Occured";
                }

   // codes inside the body of outer loop
   


}

                
   for ($d = 0; $d<sizeof($sponsor);$d++) {
      // codes inside the body of both outer and inner loop
           if($sponsor[$d] != ""){
                DB::table('sponsor')->insert([
                    'p_id'=>$id,
                    'sponsor'=>$sponsor[$d]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }
 for ($d = 0; $d<sizeof($inst_name);$d++) {
      // codes inside the body of both outer and inner loop
           if($inst_name[$d] != ""){
                DB::table('institution')->insert([
                    'p_id'=>$id,
                    'inst_name'=>$inst_name[$d]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }


 for ($i = 0; $i<sizeof($publication);$i++) {
      // codes inside the body of both outer and inner loop
           if($publication[$i] != ""){
                DB::table('publication')->insert([
                    'p_id'=>$id,
                    'publication'=>$publication[$i]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }

     for ($y = 0; $y<sizeof($name_objective);$y++) {
      // codes inside the body of both outer and inner loop
           if($name_objective[$y] != ""){
                DB::table('objective')->insert([
                    'p_id'=>$id,
                    'name_objective'=>$name_objective[$y]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }
                
 
     }     
         return redirect()->back()->with('success','Research Project Successfully Added');   
    
      }
   
 public function addprojects(){
        return view('add-project');
    }

    public function home()
    {

                $proje = DB::table('project')
                                 ->select('project.*')
                                ->where("project.centre", Auth::user()->name) 
                                ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->paginate(10);

                      

                $ppending = DB::table('project')
                         ->select(DB::raw('count(*) as progress'))
                         ->where("project.centre", Auth::user()->name)
                         ->where('level', '!=',  1)
                         ->where('status','pending')
                    ->get();

                $papproved = DB::table('project')
                         ->select(DB::raw('count(*) as approved'))
                         ->where("project.centre", Auth::user()->name)
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

return view('/home2')->with(['proje'=>$proje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])->with(['c'=>$c])
->with('i', (request()->input('page', 1) - 1) * 5);
            
       
       
    }

public function viewproject()
    {

               if(Auth::check()){
                     $proje = DB::table('project')
                                 ->select('project.*')
                                ->where("project.centre", Auth::user()->name) 
                                ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->paginate(10);

                      

                   $ppending = DB::table('project')
                    ->select(DB::raw('count(*) as progress'))
                         ->where("project.centre", Auth::user()->name)
                         ->where('level', '!=',  1)
                         ->where('status','pending')
                    ->get();

         $papproved = DB::table('project')
                    ->select(DB::raw('count(*) as approved'))
                         ->where("project.centre", Auth::user()->name)
                         ->where('level', '!=',  1)
                         ->where('status','approved')
                    ->get();

return view('uploaded-project')->with(['proje'=>$proje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])
->with('i', (request()->input('page', 1) - 1) * 5);
            
        }else{
            return redirect()->back();
        }
       
    }



    public function viewadminproject()
    {

               if(Auth::check()){
                     $proje = DB::table('project')
                                 ->select('project.*')
                                ->where("project.centre", Auth::user()->name) 
                                ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->paginate(10);

                      

                   $ppending = DB::table('project')
                    ->select(DB::raw('count(*) as progress'))
                         ->where("project.centre", Auth::user()->name)
                         ->where('level', '!=',  1)
                         ->where('status','pending')
                    ->get();

         $papproved = DB::table('project')
                    ->select(DB::raw('count(*) as approved'))
                         ->where("project.centre", Auth::user()->name)
                         ->where('level', '!=',  1)
                         ->where('status','approved')
                    ->get();

return view('uploaded')->with(['proje'=>$proje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])
->with('i', (request()->input('page', 1) - 1) * 5);
            
        }else{
            return redirect()->back();
        }
       
    }


public function viewpendingprojects()
    {

               if(Auth::check()){
                    

                         $proje = DB::table('project')
                                 ->select('project.*')
                            
                                ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->paginate(10);

                         $pproje = DB::table('project')
                                 ->select('project.*')
                             
                                ->where('level', '!=',  1) 
                                 ->where('status','pending')   
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

                  
return view('adminprogress')->with(['proje'=>$proje])->with(['pproje'=>$pproje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])
->with('i', (request()->input('page', 1) - 1) * 5);
            
        }else{
            return redirect()->back();
        }
       
    }

public function viewpendingproject()
    {

               if(Auth::check()){
                    

                         $proje = DB::table('project')
                                 ->select('project.*')
                                ->where("project.centre", Auth::user()->name) 
                                ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->paginate(10);

                         $pproje = DB::table('project')
                                 ->select('project.*')
                                ->where("project.centre", Auth::user()->name) 
                                ->where('level', '!=',  1) 
                                 ->where('status','pending')   
                                ->paginate(10);

                   $ppending = DB::table('project')
                    ->select(DB::raw('count(*) as progress'))
                         ->where("project.centre", Auth::user()->name)
                         ->where('level', '!=',  1)
                         ->where('status','pending')
                    ->get();

         $papproved = DB::table('project')
                    ->select(DB::raw('count(*) as approved'))
                         ->where("project.centre", Auth::user()->name)
                         ->where('level', '!=',  1)
                         ->where('status','approved')
                    ->get();

                  
return view('progress')->with(['proje'=>$proje])->with(['pproje'=>$pproje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])
->with('i', (request()->input('page', 1) - 1) * 5);
            
        }else{
            return redirect()->back();
        }
       
    }


public function viewadminpendingproject()
    {

               if(Auth::check()){
                    

                         $proje = DB::table('project')
                                 ->select('project.*')
                               
                                ->where('level', '!=',  1) 
                                 ->where('status','approved')   
                                ->paginate(10);

                         $pproje = DB::table('project')
                                 ->select('project.*')
                               
                                ->where('level', '!=',  1) 
                                 ->where('status','pending')   
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

                  
return view('admin-progress')->with(['proje'=>$proje])->with(['pproje'=>$pproje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])
->with('i', (request()->input('page', 1) - 1) * 5);
            
        }else{
            return redirect()->back();
        }
       
    }


function viewoneproject($id){
       


        $c = DB::table('project')
               ->where('project.id', '=',$id)
               ->where('project.status','=','approved')
               ->orderBy('created_at')
                ->get();
                      
        return view('project')->with(['c'=>$c]);
    }
 function viewProjectbyid($id){

        $pub1  = DB::table('project')
                         ->where('project.pro_id',$id)
                                            
                        ->first();
         $pub = DB::table('institution')
                    ->where('institution.p_id',$id)
                    ->get();
          $pub2 = DB::table('objective')
                    ->where('objective.p_id',$id)
                    ->get();
             $pub3 = DB::table('publication')
                    ->where('publication.p_id',$id)
                    ->get();
             $pub4 = DB::table('progress')
                    ->where('progress.p_id',$id)
                    ->paginate(10);

            $pubs =  DB::table('project')
                   ->where('project.pro_id',$id)
                     ->first();
         $c = DB::table('project')
                ->select(DB::raw('duration *4 As Alice'))
                ->where('project.pro_id',$id)
                ->get();
                   return view('view-project')->with(['pubs'=>$pubs])->with(['pub'=>$pub])->with(['pub1'=>$pub1])->with(['c'=>$c])->with(['pub2'=>$pub2])->with(['pub3'=>$pub3])->with(['pub4'=>$pub4])->with('i', (request()->input('page', 1) - 1) * 5);
    }

function viewInvestigator($id){

        $pubs  = DB::table('investigator')
                         ->where('investigator.i_id',$id)
                                            
                        ->first();

            $c = DB::table('project')
                ->select('project.*')
                ->where("project.centre", Auth::user()->name)
                ->where('level', '!=',  1)
                ->where('status','pending')
                 ->paginate(10);
         
                   return view('view-investigator')->with(['pubs'=>$pubs])->with(['c'=>$c])->with('i', (request()->input('page', 1) - 1) * 5);
    }
function viewObjective($id){

        $pubs  = DB::table('objective')
                         ->where('objective.o_id',$id)
                                            
                        ->first();

            $c = DB::table('project')
                ->select('project.*')
                ->where("project.centre", Auth::user()->name)
                ->where('level', '!=',  1)
                ->where('status','pending')
                 ->paginate(10);
         
                   return view('view-objective')->with(['pubs'=>$pubs])->with(['c'=>$c])->with('i', (request()->input('page', 1) - 1) * 5);
    }
    function editInvestigator(Request $request){

      $id = $request->id;
      $fname =$request->fname;
      $lname = $request->lname;
      $sname = $request->sname;
      $role = $request->role;
       DB::table('investigator')->where('i_id',$id)->update(['i_id'=>$id, 'fname' => $fname, 'lname'=>$lname,
        'sname'=>$sname,'role'=>$role]);
        return redirect()->back()->with('success','Research Project Investigators successfully Update');
        
    }

    
      function deleteinvestigator(Request $request){
         $id = $request->id;

         DB::table('investigator')->where('i_id',$id)->delete();
        return redirect()->back()->with('success','Research Project Investigator successfully Deleted');
}

        
   
 function viewhomeProjectbyid($id){

        $pub1  = DB::table('project')
                         ->where('project.pro_id',$id)
                                            
                        ->first();
         $pub = DB::table('institution')
                    ->where('institution.p_id',$id)
                    ->get();
          $pub2 = DB::table('objective')
                    ->where('objective.p_id',$id)
                    ->get();
             $pub3 = DB::table('publication')
                    ->where('publication.p_id',$id)
                    ->get();
             $pub4 = DB::table('progress')
                    ->where('progress.p_id',$id)
                    ->paginate(10);

            $pubs =  DB::table('project')
                   ->where('project.pro_id',$id)
                     ->first();
         $c = DB::table('project')
                ->select(DB::raw('duration *4 As Alice'))
                ->where('project.pro_id',$id)
                ->get();
                   return view('view-homeproject')->with(['pubs'=>$pubs])->with(['pub'=>$pub])->with(['pub1'=>$pub1])->with(['c'=>$c])->with(['pub2'=>$pub2])->with(['pub3'=>$pub3])->with(['pub4'=>$pub4])->with('i', (request()->input('page', 1) - 1) * 5);
    }


 function viewProjectsbyid($id){

        $pub1  = DB::table('project')
                         ->where('project.pro_id',$id)
                                            
                        ->first();
         $pub = DB::table('institution')
                    ->where('institution.p_id',$id)
                    ->get();
          $pub4 = DB::table('investigator')
                    ->where('investigator.p_id',$id)
                    ->get();
           $pub2 = DB::table('objective')
                    ->where('objective.p_id',$id)
                    ->get();
             $pub3 = DB::table('publication')
                    ->where('publication.p_id',$id)
                    ->get();
        
            $pub6 = DB::table('sponsor')
                    ->where('sponsor.p_id',$id)
                    ->get();
            $pubs =  DB::table('project')
                   ->where('project.pro_id',$id)
                     ->first();
              $c = DB::table('project')
                ->select(DB::raw('duration *4 As Alice'))
                ->where('project.pro_id',$id)
                ->get();
                $pub5 = DB::table('progress')
                    ->where('progress.p_id',$id)
                  ->paginate(10);
                   return view('view-projects')->with(['pubs'=>$pubs])->with(['pub'=>$pub])->with(['pub1'=>$pub1]) ->with(['pub6'=>$pub6])
                   ->with(['pub5'=>$pub5])->with(['pub2'=>$pub2])->with(['pub3'=>$pub3])->with(['pub4'=>$pub4])->with(['c'=>$c])->with('i', (request()->input('page', 1) - 1) * 5);
    }



function viewadminProjectsbyid($id){

        $pub1  = DB::table('project')
                         ->where('project.pro_id',$id)
                                            
                        ->first();
         $pub = DB::table('institution')
                    ->where('institution.p_id',$id)
                    ->get();
          $pub4 = DB::table('investigator')
                    ->where('investigator.p_id',$id)
                    ->get();
           $pub2 = DB::table('objective')
                    ->where('objective.p_id',$id)
                    ->get();
             $pub3 = DB::table('publication')
                    ->where('publication.p_id',$id)
                    ->get();
        
            $pub6 = DB::table('sponsor')
                    ->where('sponsor.p_id',$id)
                    ->get();
            $pubs =  DB::table('project')
                   ->where('project.pro_id',$id)
                     ->first();
              $c = DB::table('project')
                ->select(DB::raw('duration *4 As Alice'))
                ->where('project.pro_id',$id)
                ->get();
                $pub5 = DB::table('progress')
                    ->where('progress.p_id',$id)
                     ->paginate(10);
                   return view('view-adminprojects')->with(['pubs'=>$pubs])->with(['pub'=>$pub])->with(['pub1'=>$pub1]) ->with(['pub6'=>$pub6])
                   ->with(['pub5'=>$pub5])->with(['pub2'=>$pub2])->with(['pub3'=>$pub3])->with(['pub4'=>$pub4])->with(['c'=>$c])->with('i', (request()->input('page', 1) - 1) * 5);
    }






    function viewProjectsbycentre($centre){
          $pubs =  DB::table('project')
                   ->where('project.centre',$centre)
                     ->get();
                  
        $c = DB::table('project as t1')
                ->join('project as t2','t2.centre', '=','t1.centre')
                ->select(DB::raw('count(*) AS cent, t2.centre'))
                ->where('t2.status','=','approved')
                ->where('t2.level', '!=',  1)
                ->groupBy('centre')
               ->orderBy('centre')
                ->get();
        $pubs2 =  DB::table('project')
                   ->where('project.centre',$centre)
                     ->first();

                   return view('view-by-centre', compact('centre'))->with(['pubs'=>$pubs])->with(['pubs2'=>$pubs2])->with(['c'=>$c])
                   ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function manageProject()
    {

               if(Auth::check()){
                     $proje = DB::table('project')
                                 ->select('project.*')
                               
                                ->where('level', '!=',  1) 
                                 ->where('status','approved')   
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

return view('manage')->with(['proje'=>$proje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])
->with('i', (request()->input('page', 1) - 1) * 5);
            
        }else{
            return redirect()->back();
        }
       
    }

//EDIT PUBLICATION BEFORE APPROVAL
     function editProjectsbyid(Request $request){


        if($request->submit == "Delete")
{
        $id = $request->id;
        $date = date("Y-m-d");
        DB::table('project')->where('p_id',$id)->update(['level' => 1, 'level_date'=>$date]);
        return redirect()->back()->with('success','Publication successfully Delete');
}
else if($request->submit == "Update")
{
        $id = $request->id;
        $oid = $request->oid;
        $title = $request->title;
        $theme = $request->theme;
        $methodology = $request->methodology;
        $background = $request->background;
        $summary = $request->summary;
        $date_of_report = $request->date_of_report;
        $duration = $request->duration;
        $objective = $request->objective;
        $budget = $request->budget;
        $inst_name = $request->inst_name;
        $sponsor = $request->sponsor;
        $publication = $request->publication;
        $progress = $request->progress;
        $name_objective =$request->name_objective;
        $fname = $request->fname;
        $lname = $request->lname;
        $sname = $request->sname;
        $role = $request->role;
      
        DB::table('project')->update()->where('pro_id',$id);
     
  
}
        return redirect()->back()->with('success','Research Project successfully Updated');


       
    }


    function updateproject(Request $request){
 if($request->submit == "Delete")
{
        $id = $request->id;
        DB::table('project')->where('p_id',$id)->delete();
        DB::table('progress')->where('p_id',$id)->delete();
        DB::table('publication')->where('p_id',$id)->delete();
        DB::table('sponsor')->where('p_id',$id)->delete();
        DB::table('institution')->where('p_id',$id)->delete();
        DB::table('objective')->where('p_id',$id)->delete();
         DB::table('investigator')->where('p_id',$id)->delete();
        return redirect()->back()->with('success','Research Project successfully Deleted');
} 
else {
    # code...


        $id = $request->id;
        $title = $request->title;
        $theme = $request->theme;
        $methodology = $request->methodology;
        $background = $request->background;
        $objective = $request->objective;
        $date_of_report = $request->date_of_report;
        $duration = $request->duration;
        $budget = $request->budget;
        $inst_name = $request->inst_name;
        $sponsor = $request->sponsor;
        $publication = $request->publication;
        $summary = $request->summary;
        $fname = $request->fname;
        $lname = $request->lname;
        $sname = $request->sname;
        $role = $request->role;
        $name_objective =$request->name_objective;
        $name_progress =$request->name_progress;
        DB::table('project')
        ->where('pro_id',$id)
        ->update(['title'=>$title,'theme'=>$theme, 'methodology'=>$methodology, 'background'=>$background, 
            'summary'=>$summary, 'objective'=>$objective, 'duration'=>$duration, 'budget'=>$budget, 'date_of_report'=>$date_of_report]);

             $id = $request->id;

 for ($z = 0; $z<sizeof($fname);$z++) {
                

   // codes inside the body of outer loop
   if($fname[$z] != ""){
                DB::table('investigator')->insert([
                    'p_id'=>$id,
                    'fname'=>$fname[$z], 
                    'lname'=>$lname[$z], 
                    'sname'=>$sname[$z], 
                    'role'=>$role[$z]                                                        
                    ]);
                }else{
                    echo "Error Occured";
                }

   // codes inside the body of outer loop
   


}


    for ($y = 0; $y<sizeof($name_objective);$y++) {
      // codes inside the body of both outer and inner loop
           if($name_objective[$y] != ""){
                DB::table('objective')->insert([
                    'p_id'=>$id,
                    'name_objective'=>$name_objective[$y]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }

   for ($y = 0; $y<sizeof($name_progress);$y++) {
      // codes inside the body of both outer and inner loop
           if($name_progress[$y] != ""){
                DB::table('progress')->insert([
                    'p_id'=>$id,
                    'name_progress'=>$name_progress[$y]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }

   for ($d = 0; $d<sizeof($sponsor);$d++) {
      // codes inside the body of both outer and inner loop
           if($sponsor[$d] != ""){
                DB::table('sponsor')->insert([
                    'p_id'=>$id,
                    'sponsor'=>$sponsor[$d]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }
 for ($d = 0; $d<sizeof($inst_name);$d++) {
      // codes inside the body of both outer and inner loop
           if($inst_name[$d] != ""){
                DB::table('institution')->insert([
                    'p_id'=>$id,
                    'inst_name'=>$inst_name[$d]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }


 for ($i = 0; $i<sizeof($publication);$i++) {
      // codes inside the body of both outer and inner loop
           if($publication[$i] != ""){
                DB::table('publication')->insert([
                    'p_id'=>$id,
                    'publication'=>$publication[$i]                                                         
                    ]);
                }else{
                    echo "Error Occured";
                }
   }

       

return redirect()->back()
        ->with('success','Research Project successfully Updated');
       

}

}

function deleteproject(Request $request){
         $id = $request->id;
        DB::table('project')->where('pro_id',$id)->delete();
        DB::table('progress')->where('p_id',$id)->delete();
        DB::table('publication')->where('p_id',$id)->delete();
        DB::table('sponsor')->where('p_id',$id)->delete();
        DB::table('institution')->where('p_id',$id)->delete();
        DB::table('objective')->where('p_id',$id)->delete();
         DB::table('investigator')->where('p_id',$id)->delete();
        return redirect()->back()->with('success','Research Project successfully Deleted');
}

function approveproject(Request $request){

        $id = $request->id;
        $date = date("Y-m-d");      
        DB::table('project')->where('pro_id',$id)->update(['status' => 'approved', 'approved_date'=>$date]);
        return redirect()->back()->with('success','Research Project successfully Approved');

}

function updateobjective(Request $request){

        $id = $request->id;
        $name_objective = $request->name_objective;
       
        DB::table('objective')->where('o_id',$id)->update(['name_objective'=>$name_objective]);
        return redirect()->back()->with('success','Research Project Objective successfully Updated');

}

 
function deleteObjective($o_id)
    {
     
        DB::table('objective')->where('o_id',$o_id)->delete();
        return redirect()->back();
    }

//Sponsor
function viewSponsor($id){

        $pubs  = DB::table('sponsor')
                         ->where('sponsor.s_id',$id)
                                            
                        ->first();

            $c = DB::table('project')
                ->select('project.*')
                ->where("project.centre", Auth::user()->name)
                ->where('level', '!=',  1)
                ->where('status','pending')
                 ->paginate(10);
         
                   return view('view-sponsor')->with(['pubs'=>$pubs])->with(['c'=>$c])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    function updatesponsor(Request $request){

        $id = $request->id;
        $sponsor = $request->sponsor;
       
        DB::table('sponsor')->where('s_id',$id)->update(['sponsor'=>$sponsor]);
        return redirect()->back()->with('success','Research Project Sponsor successfully Updated');

}
 function deleteSponsor($s_id)
    {
     
        DB::table('sponsor')->where('s_id',$s_id)->delete();
        return redirect()->back();
    }
//Instituion

function viewInstitution($id){

        $pubs  = DB::table('institution')
                         ->where('institution.id',$id)
                                            
                        ->first();

            $c = DB::table('project')
                ->select('project.*')
                ->where("project.centre", Auth::user()->name)
                ->where('level', '!=',  1)
                ->where('status','pending')
                 ->paginate(10);
         
                   return view('view-institution')->with(['pubs'=>$pubs])->with(['c'=>$c])->with('i', (request()->input('page', 1) - 1) * 5);
    }
    function updateinstitution(Request $request){

        $id = $request->id;
        $inst_name = $request->inst_name;
       
        DB::table('institution')->where('id',$id)->update(['inst_name'=>$inst_name]);
        return redirect()->back()->with('success','Research Project Institution successfully Updated');

}

 function deleteInstitution($id)
    {
     
        DB::table('institution')->where('id',$id)->delete();
        return redirect()->back();
    }


//Publication

function viewPublication($id){

        $pubs  = DB::table('publication')
                         ->where('publication.id',$id)
                                            
                        ->first();

            $c = DB::table('project')
                ->select('project.*')
                ->where("project.centre", Auth::user()->name)
                ->where('level', '!=',  1)
                ->where('status','pending')
                 ->paginate(10);
         
                   return view('view-publication')->with(['pubs'=>$pubs])->with(['c'=>$c])->with('i', (request()->input('page', 1) - 1) * 5);
    }
    function updatepublication(Request $request){

        $id = $request->id;
        $publication = $request->publication;
       
        DB::table('publication')->where('id',$id)->update(['publication'=>$publication]);
        return redirect()->back()->with('success','Research Project Publication successfully Updated');

}

 function deletePublication($id)
    {
     
        DB::table('publication')->where('id',$id)->delete();
        return redirect()->back();
    }

// Progress
 function deleteProgress($q_id)
    {
     
        DB::table('progress')->where('q_id',$q_id)->delete();
        return redirect()->back();
    } 

   function viewProgress($q_id){

        $pubs  = DB::table('progress')
                         ->where('progress.q_id',$q_id)
                                            
                        ->first();

            $c = DB::table('project')
                ->select('project.*')
                ->where("project.centre", Auth::user()->name)
                ->where('level', '!=',  1)
                ->where('status','pending')
                 ->paginate(10);
         
                   return view('view-progress')->with(['pubs'=>$pubs])->with(['c'=>$c])->with('i', (request()->input('page', 1) - 1) * 5);
    } 

    function updateprogress(Request $request){

        $id = $request->id;
        $name_progress = $request->name_progress;
       
        DB::table('progress')->where('q_id',$id)->update(['name_progress'=>$name_progress]);
        return redirect()->back()->with('success','Research Project Quartely Progress successfully Updated');

}


}