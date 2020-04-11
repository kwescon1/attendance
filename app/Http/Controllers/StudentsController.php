<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Student; 
use App\User;
use App\Http\Resources\Student as StudentResource;
use Validator;

class StudentsController extends Controller
{
    //

    public function index(){

    	$students = Student::get()->all();

    	return StudentResource::collection($students);
    }


    public function studentRegister(Request $r){

    		$validate = Validator::make($r->all(), [
    			'index' => 'required|numeric'
    		]);

    		if($validate->fails())
    			return $this->results(['message' => $validate->getMessageBag()->first(), 'data' => null], 422);


    		$user = User::create([
    				'name' => $r['name'],
    				'password' => Hash::make($r['password']),
    				'email'    => $r['email'],
    				'role_id'  => '1',

    				]);

        		// Registering student
            $student = Student::create([
            		 'user_id'    => $user->id,
            		 'index_number' => $r['index']
            	]);

          return $this->results(['message' => 'registration success', 'data' => new StudentResource($user)]);

    			
    			
    }


  // Login function
    public function studentLogs(Request $r){

          
    }
}
