<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validator;

use App\Lecturer;

class LecturersController extends Controller
{

    public function index(){
         
        return view('welcome');

    }

     //inserting a lecturer into the datatbase
    public function signup(Request $r){

    

      		// the validation logic
      $messages =['email.required'=> 'Email is required','password.required' =>'Password is required']; //error messages to be displayed 

      $this->validate($r, [
          'email' => 'required|unique:users|email',
          'password' => 'required|alpha_num',
          'firstname' => 'required',
          'lastname'  => 'required',
        ],$messages);
 
       return "Hello welcome to Smart <code> Attendance </code>";
 
         // $lecturer = Lecturer::create([
         // 			'firstname' => $r['firstname'],
         // 			 'lastname' => $r['lastname'],
         //        	'email' 	=> $r['email'],
         //        	'password' => Hash::make($r['password'])
         // 	]);

         // return redirect('/login');
    }

   
}