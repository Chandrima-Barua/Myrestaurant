@extends('layouts.cus-app')

@section('content')
<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
        <h1>Edit Post</h1>
<form method="POST" action="{{ route('cus-post-update', $customer_post->id) }}"enctype="multipart/form-data">

    {{csrf_field() }} 
    

  <div class="form-group">
    
   <div class="col-md-6">
     <textarea  id="post" type="text"   name="body" value="{{$customer_post->body }}" required autofocus></textarea>
             
 
  </div>
  <br><br>
   <div class="form-group">
    
   <div class="col-md-6">
               <input id="image" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="image" multiple  value="{{$customer_post->image }}">

                </div>
  
  </div>
  <br><br>
<div class="col-md-6">
  <button type="submit" class="btn btn-primary">Save</button></div>
</form>
@endsection
<style type="text/css">
  
        input[type=text],textarea[type=text]{
          width: 100%;
          border: 2px solid;
        }

</style>