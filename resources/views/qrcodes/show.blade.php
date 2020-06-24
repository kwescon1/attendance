@extends('layouts.lecturer')

@section('body')
<div class="container">
<p><h3 class="section" id="section">{{ $code->created_at->toFormattedDateString() }}, {{ $code->created_at->toTimeString() }}</h3></p>
          <br>
          @include('alerts.alerts')
            <div align="center">
                <img src="{{ $code->image }}">
            </div>

 </div>

@endsection
