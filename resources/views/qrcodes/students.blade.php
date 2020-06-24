@extends('layouts.lecturer')

@section('body')
<div class="table-responsive">
<p><h3 class="section" id="section"> Attendance for {{ $code->course->course_name }}</h3></p>
          <br>
          @include('alerts.alerts')
             <table class="table table-striped">
                <thead>
                   <tr>
                        <th class="center">Student</th>
                        <th class="center">Attendance Present</th>
                        <th class="center">Time</th>

                    </tr>
                </thead>
             <tbody>

            @foreach($records as $record)

                <tr>
                    <td>{{$record->student->user->name}}</td>
                    <td>{{$record->present}}</td>
                    <td>{{$record->created_at->toTimeString()}}</td>

                </tr>

            @endforeach

             </tbody>


            </table>
 </div>


@endsection
