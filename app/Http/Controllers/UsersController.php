<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Lecturer;

class UsersController extends Controller
{

	public function index(){
         
        return view('welcome');

    }


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
                            'name' => $r['name'],
                            'email'    => $r['email'],
                            'password'  => Hash::make($r['password']),
                            'role_id'   =>  '2',
                  ]);
                
                 $data_2 = array(
                            'user_id' => $user->id,
                            'name'    => $r['name'],
                      );
                Lecturer::insert($data_2);

			         return redirect('/signin');
    }
}
