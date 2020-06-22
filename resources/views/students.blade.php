@extends('layouts.lecturer')
@include('alerts.alerts')

@section('body')
 
  	<div class="table-responsive">
     <p>
        <h3 class="section" id="section">
            Registered Students
        </h3>
    </p>

     <br>
     <table class="table table-striped">
        <thead>
        <tr>
            <th style="font-family: 'Arial'; ">Name</th>
            <th style="font-family: 'Arial'; ">Index number</th>
        </tr>
        </thead>
        <tbody>
               
        
             @foreach($students as $student)
            
           <tr>
         <td>{{ $student->user->name}}</td>
         <td>{{ $student-> index_number}}</td>
         </tr>
            
      	  @endforeach

      </tbody>
     </table>
@endsection

