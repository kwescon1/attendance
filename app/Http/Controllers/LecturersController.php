<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;

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

    public function logout (){
		    Auth::logout();
		    return redirect("/");  
    }

     //inserting a lecturer into the datatbase
    
    public function register(Request $r){


      		// the validation logic
      $messages =['email.required'=> 'Email is required',
                  'password.required' =>'Password is required']; //error messages to be displayed 

			      $this->validate($r, [
			          'email' => 'required|unique:users,email|email',
			          'password' => 'required|alpha_num|max:10',
			          'name' => 'required',
			        ],$messages);
       
             // Inserting the details into the database
			         $user = User::create([
			         			'name'      => $r['name'],
			                	 'email'    => $r['email'],
			                	'password' 	=> Hash::make($r['password']),
			                	'role_id' 	=> 	'2',
			         	]);

			         return redirect('/signin');
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
                  
                  if(Auth::attempt($credentials)){

                  	  // Authentication passed, lecturer is now logged in
                  	   return redirect()->intended('dashboard');
                  } else {
                  	return back()->with('Failed','Incorrect email or password');
                  }

           }


  				// $user = User::where('email', $r->email)->first();

  				// if(!$lecturer)
  				// 	return back()->with('Failed', 'Incorrect email or password');

  				// if(Hash::check($r->password, $lecturer->password)) {
  				// 	Auth::login($lecturer);
  				// 	return redirect()->intended('dashboard');
  				// }
  				// else 
  				// 	return back()->with('Failed', 'Incorrect email or password');

           public function addCourses(Request $r){
           	$messages =['course_code.required'=> 'Course Code is required and should be in alpha numeric',
                  'course_name.required' =>'Course Name is required']; //error messages to be displayed 

			       $this->validate($r, 
			       		[
			          'course_code' => 'required',
			          'course_name' => 'required',
			            
			       		], $messages);

           	return $r->all();

           }

  				
       }

 
