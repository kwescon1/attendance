@extends('layouts.lecturer')

@section('body')
<div class="table-responsive">
       <p><h3 class="section" id="section">Generated Code</h3></p>
          <br>
          @include('alerts.alerts')
             <table class="table table-striped">
                <thead>
                   <tr>
                        <th class="center">Qr Code</th>
                        <th class="center">Attendance Present</th>
                        <th class="center">Date Generated</th>
                        <th class="center">Action</th>
                    </tr>
                </thead>
             <tbody>

            @foreach($qr_codes as $qrcode)

                <tr>
                    <td align="center"><img src="{{ $qrcode->image }}" height="90"></td>
                    <td align="center">{{  $qrcode->records()->present()->count() }}</td>
                    <td align="center">{{ $qrcode->created_at->toFormattedDateString() }} , {{ date("g:i a", strtotime($qrcode->created_at->toTimeString())) }}</td>
                    <td align="center"><a href="{{ route('qrcode.show', ['id' => $qrcode->id]) }}" class="btn btn-primary">View Students</a></td>
                </tr>

            @endforeach

             </tbody>


            </table>
 </div>


@endsection
