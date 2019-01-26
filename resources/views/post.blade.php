
@extends('layouts.app')

@section('content')

 <h1>Post</h1>
<form method="POST" action="{{ route('post_store') }}" enctype="multipart/form-data">

    {{csrf_field() }}
    <div class="form-group">

     <div class="col-md-6">
         <input id="restaurant_name" type="text" placeholder="Restaurant Name:"  name="restaurant_name" value="{{ old('restaurant_name') }}" required autofocus>
    
                            </div>
                          </div>
  <br><br>
  <div class="form-group">

     <div class="col-md-6">
         <input id="subject" type="text" placeholder="Subject"  name="subject" value="{{ old('subject') }}" required autofocus>
    
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
               <input id="image" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="image[]"   value="{{ old('image[]') }}" multiple>

                </div>
  
  </div>
  
<div class="col-md-6">
  <button type="submit" class="btn btn-primary">Post</button></div>
</form>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <div class="card-header" >
              <ul class="navbar-nav">
         
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('show') }}"><b> See Posts</b></a>
                   </li>
              </ul>
            </div>
      </nav>

@endsection
<style type="text/css">
  
        input[type=text],textarea[type=text]{
          width: 100%;
          border: 2px solid;
        }

</style>