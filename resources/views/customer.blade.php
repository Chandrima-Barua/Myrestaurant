@extends('layouts.cus-app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome Customers!</div>

               <div class="card-body">

 <br><br>
<div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
         <a class="nav-link" href="/"><b>Home</b> <span class="sr-only">(current)</span></a>
      </li>
      
      
       <li class="nav-item">
          <a class="nav-link" href="{{ route('list')}}"><b>Show List</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('cus-post') }}"><b>Post</b></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('cus-post-show') }}"><b> See Posts</b></a>
     </li>
     <li class="nav-item">
          <a class="nav-link" href="/"><b>Back</b></a>
      </li>
    </ul>

  </div>
</nav>
 </div>

 
            </div>

        </div>
         <br><br>
         
    </div>
</div>

@endsection
 
    <style type="text/css">
      
    </style>
