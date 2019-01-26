@extends('layouts.cus-app')

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
     <div><h3><b>Restaurant Name : {{ $owner->restaurant_name}}</b></h3> </div>
    
     <div><h3><b>Address: {{ $owner->address}}</b></h3> </div>
  
     <div><h3><b>Category : {{ $owner->categories }}</b></h3> </div>
  
  
     <div><h3><b>Seating Capacity : {{ $owner->seating_capacity }}</b></h3> </div>
 
     <div><h3><b>Available Time: {{ $owner->time}}</b></h3></div>
  
     <div><h3><b>Menu: </b></h3>

       <img src="{{ asset('images/' . $owner->image)}}" height="100" width="100"> </div>
     <br>
       
     <div><h2>For Booking Please Contact With Us!</h2>

        <h3><b>Phone Number: {{ $owner->phone_number }}</b></h3></div>
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