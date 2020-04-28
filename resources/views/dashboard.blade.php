@extends('layouts.lecturer')

@section('body')
    <p>
        <h3 class="section" id="section">
            Lecturer's dashboard
        </h3>
    </p>
<div class="contain">
       <div class="row">
     <div class="items">
         <button class="btn btn-danger" id="dashbutton"> 
            <a href="{{ route('addCourses') }}" id="courses"><span><i class="fas fa-book mr-2"></i></span>Add courses</a> 
         </button>
</div>
   <div class="items">
      <button class="btn btn-danger" id="dashbutton"> 
          <a href="{{route('showQrcode') }}" id="courses">
             <span><i class="fas fa-home mr-2"></i></span> </a>
               Generate code
        </button>
</div>
       <div class="items">
          <button class="btn btn-danger" id="dashbutton"> 
            <a href="{{ route('showCourses') }}" id ="courses">
              <span><i class="fas fa-cog mr-2"></i></span>
               Manage Courses</a>    
         </button>
     </div>
  </div>     
</div>

@endsection
