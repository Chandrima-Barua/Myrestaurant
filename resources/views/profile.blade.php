@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-9 col-md-offset-3">
        @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ Session::get('success') }}
        </div>
        @endif

     
    
   
    <div class="input" >
     <div><h3><b>Restaurant Name : {{ $owner->restaurant_name}} </b></h3></div>
    
     <div><h4><b>Address: {{ $owner->address}}</b></h4> </div>
  
     <div><h4><b>Category : {{ $owner->categories }} </b></h4></div>
  
     <div><h4><b>Phone Number: {{ $owner->phone_number }}</b></h4></div>
  
     <div><h4><b>Seating Capacity : {{ $owner->seating_capacity }}</b></h4> </div>
 
     <div><h4><b>Available Time: 
        {{ $owner->time }}  </b></h4>  </div>
  
     <div><h4><b>Menu: </b></h4>

       <img src="{{ asset('images/' . $owner->image)}}" height="100" width="100"> </div>
     <a class="btn btn raised btn-primary btn-sm" href="{{ route('edit', $owner->id) }}"><i class="fas fa-pencil-alt"></i></a>               

       
    <br><br>
  </div>
   
</div>
</div>
@endsection
<style type="text/css">
  
  .input{
    width: 100%;
    border: 2px solid;
   
  }
</style>