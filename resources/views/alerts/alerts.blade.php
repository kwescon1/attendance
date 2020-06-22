@if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
        {{ Session::get('success') }}
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-warning">
        {{ Session::get('warning') }}
    </div>
@elseif(Session::has('message'))
    <div class="alert alert-success alert-dismissable">
        {{ Session::get('message') }}
    </div>
@endif