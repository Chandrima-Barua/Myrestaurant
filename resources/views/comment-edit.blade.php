@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
        <h3>Edit Comment</h3>
<form method="POST" action="{{ route('comment_update', $comment->id) }}">

    {{csrf_field() }} 
     <textarea id="input1" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="comment" value="{{ $comment->comment }}" required autofocus> </textarea>
     <br>
     <button type="submit" class="btn btn-primary">Save</button>
    
</form>
@endsection
<style type="text/css">
  
        input[type=text],textarea[type=text]{
          width: 100%;
          border: 2px solid;
        }

</style>