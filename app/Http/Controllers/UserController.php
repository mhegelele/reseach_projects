<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Input;
use Validator;
use Redirect;
use DB;
class UserController extends Controller
{

public function index(){

    if(Auth::check()){
                     $proje = DB::table('users')
                                 ->select('users.*')
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

return view('/users/user')->with(['proje'=>$proje])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved])
->with('i', (request()->input('page', 1) - 1) * 5);
            
        }else{
            return redirect()->back();
        }
   
}
     
      function edituser($id){

        $pubs  = DB::table('users')
                         ->where('users.id',$id)                
                        ->first();

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
            return view('/users/edit')->with(['pubs'=>$pubs])->with(['ppending'=>$ppending])->with(['papproved'=>$papproved]);
}
 

     function updateuser(Request $request){

        $id = $request->id;
        $username = $request->username;
        $level = $request->level;
       
        DB::table('users')->where('id',$id)->update(['username'=>$username, 'level'=>$level]);
        return redirect()->back()->with('success','User successfully Updated');

}

 function deleteUser($id)
    {
     
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back();
    }


    function userRegistration(Request $request){
        $data = Input::except(array('_token'));
        $rule = array(
            'name'=>'required|unique:users|min:5',
            'username'=>'required|unique:users|min:5',
            'password'=>'required|min:4',
            'cpassword'=>'same:password'
            );
        $message = array(
            'cpassword.same'=>'provided passwords does not match',
            'name.required'=>'Centre name field is required',
            'username.required'=>'Username is required'
            );
        $validator = Validator::make($data,$rule,$message);
        if ($validator->fails()) {
            return Redirect::to('manage/user')->withErrors($validator)->withInput();
        }else{
            $name = $request->name;
            $username = $request->username;
            $password = bcrypt($request->password);
         DB::table('users')->insert(
                ['name'=>$name,'username'=>$username,
                'password'=>$password]
                );  

             return back()->with('success', 'User Added Successfully.');
         
        }
    }

}
