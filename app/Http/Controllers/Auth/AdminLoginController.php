<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{

	public function __construct(){

		$this->middleware('guest:admin');
	}
    public function showLoginForm(){

    	return view('auth.admin-login');
    }
    public function Login(Request $request)
    {
    	/*
    	all steps are-
    	1.validate the form data*/
        
         $this->validate($request,[
         	'email' => 'required|email',
         	'password'=>'required|min:6'
         ]);

         

    	//2.log the user in

         if (Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password], $request->remember)) {

         	//3. if successful then redirect to their intended page/loaction
         	 return redirect()->intended(route('admin.dashboard'));
         	
         }
    	
    	//4. if unsuccessful then redirect back to  login with the form data
             return redirect()->back()->withInput($request->only('email', 'remember'));
    	
    }
}
 
