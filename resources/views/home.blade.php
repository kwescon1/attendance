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
            
        <h3 class="section" id="signup-form">Sign In</h5>
        <div class="row">
            <form action="{{ url('signin') }}" method="POST">
              @csrf
                      <div class="form-group">
                         <label for="email">Email address</label>
                           <input type="email" class="form-control" name ="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" style="width: 200%;">
                                  </div>

                                    <div class="form-group">
                                      <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="width: 200%;">
                                 </div>

                               
                  <button type="submit" class="btn btn-primary col-md-8 offset-md-8" name="signin">Login</button>
                </form>
            </div>
    </div>
</body>
</html>