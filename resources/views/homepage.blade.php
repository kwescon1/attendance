<!DOCTYPE html>
<html>
<head>
	<title>Smart Attendance</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

</head>

<body style="background-image: url('{{asset('images/smart_5.jpg')}}'); background-repeat: repeat-y; background-size: 100%;">
   <div class="container-fluid">
   	 <div class="row">
		<div class="col-xl-12" id="landing_page_writeup">
		    <h1 id="home_writeup">TAKE ATTENDANCE IN A <br>SNAP WITH THE HELP OF <code>QR CODE</code>,</h1>	<br>
		       <h4 id="get_started">GET <code>STARTED! </code></h4> <br>
		</div>
		  <div class="container">
		  	<div class="row">
		  		<button class="btn btn-danger col-md-6"> <a href="{{ route('signup_page')}}" id="sign">Sign Up</a></button>
		  			<button class="btn btn-primary col-md-6"> <a href="{{ route('signin')}}" id="sign">Sign In</a></button>
		  	</div>
		  </div>
	</div>
   </div>
</body>
</html>