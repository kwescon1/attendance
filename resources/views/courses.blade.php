@extends('layouts.lecturer')

@section('body')
	
	<div class="container" style="margin: 20px 0px;">

   <div class="row">
     <div class="col-md-8">
        <h2 style="font-family: Arial;">Add Courses</h2>
     </div>
     <div class="col-md-4">
       <div class="row">
         <div class="col-md-6">
           <input type="number" name="number" id="number" placeholder="" class="form-control">
         </div>
         <div class="col-md-6">
           <button class="btn btn-primary btn-block add-field">Add Field(s)</button>
         </div>
       </div>
     </div>
   </div>

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
            
  
   
      <!-- <table class="table table-striped"> -->
        
      <!-- <tbody> -->

        <!-- beginning of form -->
        <form action="{{ route('addCourses') }}" method="POST" name="courses"> 
               @csrf

         <div class="table-responsive">
          <table class="table table-striped">

            <thead>
              <tr>
                <th style="font-family: 'Arial';">Course Code</th>
                <th style="font-family: 'Arial';">Course Name</th>  
              </tr>
            </thead>
            
             <tbody class="fields">
              <tr>          
                  <td>
                       <div class="form-group">
                            <input type="text" class="form-control" required name ="course_code[]"  placeholder="Code" style="width:30%;">
                           </div>
                        </td>
                    <td>
                   <div class="form-group">
                       <input type="text" class="form-control" required name ="course_name[]"  placeholder="Name" style="width:50%;">
                     </div>
                   </td> 
              </tr>
              <tr>
                         <td>
                      <div class="form-group">
                              <input type="text" class="form-control" required name ="course_code[]"  placeholder="Code" style="width:30%;">
                       </div>
                      </td>
                     <td>
                      <div class="form-group">
                              <input type="text" class="form-control" required name ="course_name[]"  placeholder="Name" style="width:50%;">
                       </div>
                     </td> 
               
              </tr>

              <tr>        
                    <td>
                         <div class="form-group">
                              <input type="text" class="form-control" required name ="course_code[]" placeholder="Code" style="width:30%;">
                             </div>
                        </td>
                     <td>
                        <div class="form-group">
                              <input type="text" class="form-control" required name ="course_name[]" placeholder="Name" style="width:50%;">
                       </div>
                     </td> 
              </tr>
                      
              <tr>
                        <td>
                         <div class="form-group">
                              <input type="text" class="form-control" required name ="course_code[]" placeholder="Code" style="width:30%;">
                             </div>
                        </td>

                        <td>
                        <div class="form-group">
                              <input type="text" class="form-control" required name ="course_name[]" placeholder="Name" style="width:50%;">
                       </div>
                     </td> 

                     

              </tr> 
            </tbody> 

          </table>
         

          <tr>
            <td colspan="2">
              <div class="form-group" align="center">
                <button class="btn btn-primary col-md-2">ADD COURSES</button>
              </div>
            </td>
          </tr>     

         </div>
      </form>
       <!-- End of form -->

 

</div>

@endsection


@section('js')
  <script type="text/javascript" src="{{ asset('js/courses.js') }}"></script>
@endsection