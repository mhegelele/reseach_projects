<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Session;

class AuthController extends Controller
{
 
    public function index()
    {
        return view('login');
    }  
 
    public function registration()
    {
        return view('registration');
    }
     
   

    function postLogin(Request $request){
        $data = Input::except(array('_token','submit'));
        $rule = array(
            'username'=>'required|username',
            'password'=>'required',
            );
        $validator = Validator::make($data,$rule);
        if ($validator->fails()) {
            return Redirect::to('login')->withErrors($validator)->withInput();
        }else{ 
            $username = $request->username;
            $password = $request->password; 
            if (Auth::attempt($data)) {
            // Authentication passed...
            return redirect()->intended('');
            }
            else{
            return redirect()->back()->with('error','wrong username and password commbination.');
            }
        }
    }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'username' => 'required',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();
 
        $check = $this->create($data);
       
        return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
     
    public function dashboard()
    {
 
      if(Auth::check()){
        return view('dashboard');
      }
       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'username' => $data['username'],
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
