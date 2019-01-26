@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('store_comment',$comment->id )}}">
  

	{{ csrf_field() }}
	<div class="form-group">
     <div class="col-md-6">

     	 <h3>Comment on this post!</h3>

               <input id="input1" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="comment" value="{{ old('commnet') }}" required autofocus>
   
    </div>
    <br>
	<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Comment</button></div>
    

</form>

@endsection

<style type="text/css">
	
	
</style>