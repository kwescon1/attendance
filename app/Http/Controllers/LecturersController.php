<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use QrCode;
use App\User;
use App\Course;
use App\Lecturer;
use App\Student;
use App\Qr_code;
class LecturersController extends Controller

{

	public function __construct(){
		$this->middleware('auth',['only'=> ['dashboard']]);
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
	      	return back()->with('error','Incorrect email or password');
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
        $user = Auth()->user()->id;
        $lecturer = Lecturer::where('user_id',$user)->get('id');
        $lecturer_id = $lecturer[0]['id'];
      	$messages =['course_code.required'=> 'Course Code is required and should be in alpha numeric',
              		'course_name.required' =>'Course Name is required']; //error messages to be displayed 

                   $this->validate($r, 
       		           [
                     'course_code' => 'required',
                      'course_name' => 'required',
       		           ], $messages);

	     // inserting the course details into the courses table


           	for($i=0; $i<count($r->course_code); $i++) {
           		Course::create([
           			'lecturer_id' => $lecturer_id,
           			'course_code' => $r->course_code[$i],
           			'course_name' => $r->course_name[$i]
           		]);
       	}


        // $course = Course::create([
       	// 	'user_id' => Auth::id(),
       	// 	'course_code' => json_encode($r['course_code']),
       	// 	'course_name' => json_encode($r['course_name']),

       	// ]);

        return back()->with('message', 'Course Added Successfuly');	 
    }
        
        public function showCourses(Request $r){
       		$user = Auth::user()->id;
          $lecturers = Lecturer::where('user_id',$user)->get('id');
          $lecturer_id = $lecturers[0]['id'];
          $courses = Course::where('lecturer_id',$lecturer_id)->get()->all();
    	  	return view('added_courses',compact("courses"));
       	}

    
        public function destroy($id){
               $course = Course::where('id',$id)->first();
               $course->delete();
               return back()->with('success', "Course deleted Successfuly");				
       } 

    // show the details of the number of students registered
       public function showStudent(){
           $students = Student::with('user')->get();
           return view('students',compact("students"));
         }

      public function showcodeform(){  
        return view('qrcode');
    }


      public function generateCode(Request $r){
        $user = Auth::user()->id;
        $lecturers = Lecturer::where('user_id',$user)->get('id');
        $lecturer_id = $lecturers[0]['id'];
        $courses = Course::where('lecturer_id',$lecturer_id)->get();
 
        return view('qrcode',compact("courses"));

        $name = uniqid().".png";
        $uniq_id = $r['course_code'];
        QrCode::format('png')->size(400)->generate($uniq_id, '../public/images/codes/'.$name);
        
        Qr_code::create([
        'lecturer_id' => $lecturer_id,
        'image'       => $name,
        'course_id'   => $uniq_id,  
        ]);
       

       return back()->with('success','code generated successfully');
  }

}
 
