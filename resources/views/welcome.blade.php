<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance | Home </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/custom.css') }}">   
</head>
<body style="background-image: url('{{asset('images/smart_1.jpg')}}'); background-size: 100%;">
    <div class="contain">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Smart Attendance</a>  
         </nav>    
       </div>

    <div class="container-fluid" id="signup-form-box">

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
            
        <h3 class="section" id="signup-form">Sign Up</h5>
        <div class="row">
            <form action="{{ url('register') }}" method="POST">
              @csrf
            <div class="form-group">
                 <label for="name">Name</label>
                    <input type="text" class="form-control" style="width:400px;" id="name" name="name" placeholder="Full Name">
                      </div>

                       <div class="form-group">
                         <label for="exampleInputEmail1">Email address</label>
                           <input type="email" class="form-control" name ="email" id="email" aria-describedby="emailHbklelp" placeholder="Enter email">
                               <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                  </div>

                                    <div class="form-group">
                                      <label for="password-confirm">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                 </div>

                                 <div class="form-group">
                                      <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Confirm password" >
                                 </div>
                  <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
                </form>
            </div>
    </div>
</body>
</html>