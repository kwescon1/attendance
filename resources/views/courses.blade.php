@extends('layouts.lecturer')

@section('body')
	
	<div class="contain" style="margin: 50px;">
		<div class="table-responsive">

    <h2 style="font-family: Arial;">Add Courses</h2>

    	 <!-- Code to display error messages in registering -->
                        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
    	<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th style="font-family: 'Arial';">Course Code</th>
            <th style="font-family: 'Arial';">Course Name</th>  
          </tr>
        </thead>
      <tbody>

<!-- beginning of form -->
<form action="{{ route('addCourses') }}" method="POST"> 
       @csrf

   <tr>          
         <td>
           	 <div class="form-group">
                  <input type="text" class="form-control" name ="course_code" id="email" aria-describedby="emailHelp" placeholder="Code" style="width:20%;">
          			 </div>
          		</td>
         	<td>
         <div class="form-group">
             <input type="text" class="form-control" name ="course_name" id="email" aria-describedby="emailHelp" placeholder="Name" style="width:50%;">
           </div>
         </td> 
             </tr>
      <tr>
           	 <td>
          <div class="form-group">
                  <input type="text" class="form-control" name ="course_code" id="email" aria-describedby="emailHelp" placeholder="Code" style="width:20%;">
           </div>
          </td>
         <td>
         	<div class="form-group">
                  <input type="text" class="form-control" name ="course_name" id="email" aria-describedby="emailHelp" placeholder="Name" style="width:50%;">
           </div>
         </td> 
   
          </tr>

          <tr>        
        <td>
           	 <div class="form-group">
                  <input type="text" class="form-control" name ="course_code" id="email" aria-describedby="emailHelp" placeholder="Code" style="width:20%;">
          			 </div>
          	</td>
         <td>
         		<div class="form-group">
                  <input type="text" class="form-control" name ="course_name" id="email" aria-describedby="emailHelp" placeholder="Name" style="width:50%;">
           </div>
         </td> 
             </tr>
          
          <tr>
          	<td>
           	 <div class="form-group">
                  <input type="text" class="form-control" name ="course_code" id="email" aria-describedby="emailHelp" placeholder="Code" style="width:20%;">
          			 </div>
          	</td>

          	<td>
         		<div class="form-group">
                  <input type="text" class="form-control" name ="course_name" id="email" aria-describedby="emailHelp" placeholder="Name" style="width:50%;">
           </div>
         </td> 

         <td>
           	<div class="form-group">
           		<button class="btn btn-primary	">Add Courses</button>
           	</div>
         </td>

        </tr>       
       </form>
       <!-- End of form -->
        </tbody>
    </table>
</div>
	</div>
	  </div>

@endsection
