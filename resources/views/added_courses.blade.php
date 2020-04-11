@extends('layouts.lecturer')

@section('body')
 
  	<div class="table-responsive">
     <p>
        <h3 class="section" id="section">
            My Courses
        </h3>
    </p>

     <br>
     <table class="table table-striped">
        <thead>
        <tr>
            <th style="font-family: 'Arial'; ">Course Code</th>
            <th style="font-family: 'Arial'; ">Course Name</th>
            <th style="font-family: 'Arial'; ">Delete</th>
        </tr>
        </thead>
        <tbody>
      
         
           @foreach($courses as $course)
           <tr>
         <td>{{ $course->course_code }}</td>
         <td>{{ $course->course_name }}</td>

         <td>

         <form action="{{ route('deleteCourse', ['id' => $course['id'] ]) }}" method="POST">
            @csrf
                {{ method_field('DELETE') }}
            <button value ="submit" class="btn btn-sm btn-fill btn-primary"> 
                Remove</button>
         </form>
         </td>
         </tr>
      	  @endforeach

      </tbody>
     </table>
@endsection