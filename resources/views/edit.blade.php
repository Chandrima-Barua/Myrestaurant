@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
      <h1>Edit</h1>

<form method="POST" action="{{ route('update', $owner->id) }}" enctype="multipart/form-data">

    {{csrf_field() }}  
       
       <div class="form-group">
    <label for="forminput1">Restaurant Name</label>
    
     <div class="col-md-6">
                                <input id="input1" type="text"  name="restaurant_name" value="{{ $owner->restaurant_name }}" readonly>

                               
                            </div>
  
  <div class="form-group">
    <label for="forminput2">Address</label>
   <div class="col-md-6">
                                <input id="input2" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="address" value="{{ $owner->address }}" required autofocus>

                               
                            </div>
  
  </div>
   <div class="form-group">
    <label for="forminput3">Category</label>
   <div class="col-md-6">
                                <input id="input3" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="categories" value="{{ $owner->categories }}" required autofocus>

                            </div>
  
  </div>
  <div class="col-md-6">

  <div class="form-group">
   <label for="forminput4">Phone Number</label>
   <div class="col-md-6">
                                <input id="input4" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $owner->phone_number }}" required autofocus>

                               
                            </div>
  
  </div>

   <div class="form-group">
    <label for="forminput5">Seating Capacity</label>
   <div class="col-md-6">
                                <input id="input5" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="seating_capacity" value="{{ $owner->seating_capacity }}" required autofocus>

                               
                            </div>
  
  </div>


   <div class="form-group">
    <label for="forminput6">Available Time</label>
   <div class="col-md-6">
                                <input id="input6" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="time" value="{{ $owner->time }}" required autofocus>

                               
                            </div>
  
  </div>


  <div class="form-group">
    <label for="forminput7">Menu</label>
   <div class="col-md-6">
                                <input id="input7" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="image" value="{{ $owner->image }}" >

                              
                            </div>
  
  </div>
<div class="col-md-6">
  <button type="submit" class="btn btn-primary">Save</button></div>
</form>
@endsection
