<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


use App\Lecturer;

class LecturersController extends Controller

{

	public function __construct(){
		$this->middleware('auth',['only'=> ['dashboard']]);
	}

    public function index(){
         
        return view('welcome');

    }

    public function dashboard(){
    	return view('dashboard');
    }


    public function login_page(){

    	return view('login');
    }

     //inserting a lecturer into the datatbase
    public function signup(Request $r){

      		// the validation logic
      $messages =['email.required'=> 'Email is required',
                  'password.required' =>'Password is required']; //error messages to be displayed 

      $this->validate($r, [
          'email' => 'required|unique:lecturers,email|email',
          'password' => 'required|alpha_num|max:10',
          'firstname' => 'required',
          'lastname'  => 'required',
        ],$messages);
 
       
             // Inserting the details into the database
         $lecturer = Lecturer::create([

         			'firstname' => $r['firstname'],
         			 'lastname' => $r['lastname'],
                	 'email'    => $r['email'],
                	'password' => Hash::make($r['password'])
         	]);

         return redirect('/login');
    }


       // Login Script
       public function login(Request $r){

      $messages =['email.required'=> 'Email is required',
                  'password.required' =>'Password is required']; //error messages to be displayed 

       $this->validate($r, 
       		[

          'email' => 'required|email',
          'password' => 'required|alpha_num|max:10',
            
       		], $messages);

       

       		$credentials = $r->only('email','password');
  				
  				// Lecturer is logged in here
       		if (Auth::attempt($credentials)) {
       			
      //  			// Auth passed 
      //  			// Redirect to dashboard

       			return $credentials;
       		}

       		else {
       			return back()->withFlash('Incorrect email or password');
       		} 
            
       }

   
}
