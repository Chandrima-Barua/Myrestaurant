@extends('layouts.cus-app')

@section('content')

 <h2>Post</h2>
<form method="POST" action="{{ route('cus-post-store') }}" enctype="multipart/form-data">

    {{csrf_field() }}
    <div class="form-group">

     <div class="col-md-6">
         <input id="name" type="text" placeholder=" Name:"  name="name" value="{{ old('name') }}" required autofocus>
    
                            </div>
                          </div>
  
  <br><br>
  <div class="form-group">
    
   <div class="col-md-6">
                                <textarea  id="post" type="text" placeholder="Post Here.."  name="body" value="{{ old('body') }}" required autofocus></textarea>

                            </div>
  
  </div>
  <div class="form-group">
    
   <div class="col-md-6">
               <input id="image" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="image" multiple  value="{{ old('image') }}">

                </div>
  
  </div>
  
<div class="col-md-6">
  <button type="submit" class="btn btn-primary">Post</button></div>
</form>

 
           <div class="card-header" >
              <ul class="navbar-nav">
         
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('cus-post-show') }}"><h4><b> Customers Posts</b></h4></a>
                   </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/customer"><h4><b>Home</b></h4></a>
                   </li>
              </ul>
            </div>
      

@endsection
<style type="text/css">
  
        input[type=text],textarea[type=text]{
          width: 100%;
          border: 2px solid;
        }

</style>