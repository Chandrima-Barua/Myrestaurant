
@extends('layouts.app')

@section('content')

 <h1>Create Your Profile!</h1>
<form method="POST" action="{{ route('profile_update', $profile->id) }}"  enctype="multipart/form-data">

	{{csrf_field() }}
  <div class="form-group">
    <label for="forminput1">Restaurant Name</label>
    
     <div class="col-md-6">
                                <input id="input1" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="restaurant_name" value="{{ $profile->restaurant_name }}"  readonly>

                               
                            </div>
  
  <div class="form-group">
    <label for="forminput2">Address</label>
   <div class="col-md-6">
                                <input id="input2" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="address" value="{{ $profile->address }}" required autofocus>

                                
                            </div>
  
  </div>
   <div class="form-group">
    <label for="forminput3">Category</label>
   <div class="col-md-6">
                                <input id="input3" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="categories" value="{{ $profile->categories }}" required autofocus>

                                
                            </div>
  
  </div>
<div class="col-md-6">

  <div class="form-group">
   <label for="forminput4">Phone Number</label>
   <div class="col-md-6">
                                <input id="input4" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $profile->phone_number }}" required autofocus>

                               
                            </div>
  
  </div>

   <div class="form-group">
    <label for="forminput5">Seating Capacity</label>
   <div class="col-md-6">
                                <input id="input5" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="seating_capacity" value="{{ $profile->seating_capacity }}" required autofocus>

                               
                            </div>
  
  </div>


   <div class="form-group">
    <label for="forminput6">Available Time</label>
   <div class="col-md-6">
                                <input id="input6" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="time" value="{{ $profile->time }}" required autofocus>

                               
                            </div>
  
  </div>


  <div class="form-group">
    <label for="forminput7">Menu</label>
   <div class="col-md-6">
                                <input id="input7" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="image[]" value="{{ $profile->image }}" multiple>

                              
                            </div>
  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button></div>
</form>
@endsection
