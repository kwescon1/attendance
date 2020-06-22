@extends('layouts.lecturer')
@section('body')
  	<div class="table-responsive">
       <p><h3 class="section" id="section">My Courses</h3></p>
          <br>
          @include('alerts.alerts')
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
         <button value ="submit" class="btn btn-sm btn-fill btn-primary" data-toggle="modal" data-target="#exampleModal">Remove</button>
         
        </td>
     </tr>
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete {{$course->course_code}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('deleteCourse', ['id' => $course['id'] ]) }}" method="POST">
            @csrf
              {{ method_field('DELETE') }}
              <button value ="submit" class="btn btn-sm btn-fill btn-primary">Delete</button>

           
         </form>
        
      </div>
    </div>
  </div>
</div>
      	  @endforeach
      </tbody>
     </table>
     


@endsection

