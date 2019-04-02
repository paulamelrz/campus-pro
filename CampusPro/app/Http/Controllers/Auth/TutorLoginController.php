<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TutorLoginController extends Controller
{
    
    public function __construct(){
        $this->middleware('guest:tutor');
    }
    
    public function showLoginForm(){
        //return login form view
        return view('auth.tutor-login');
    }
    
    public function login(Request $request){
        //validate form data
        $this->validate($request, [
            'email'=> 'required|email', 
            'password' => 'required|min:8']);
        
         //if login is successful, then redirect to wherever user wanted to go (intended)
        if(Auth::guard('tutor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('tutor'));
        }
        //if unsuccessful redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));//withInput autofills forms
        
        return true;
    }
}
