<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Student;
use App\Http\Resources\Student as StudentResource;

class StudentsController extends Controller
{
    //

    public function index(){

    	$students = Student::get()->all();

    		return StudentResource::collection($students);
    }


    public function studentRegister(Request $r){

        		// Registering student
            $student = Student::create([

            		 'name'=> $r['name'],
            		 'index' => $r['index']
            	]);

    				return new StudentResource($student);
    			
    }


  // Login function
    public function studentLogs(Request $r){

          
    }
}
