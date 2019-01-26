
@extends('layouts.app')

@section('content')

 <h1>Create Your Profile!</h1>
 
<form method="POST" action="{{ route('profile_store') }}">

	{{csrf_field() }}
  <div class="form-group">
    <label for="forminput1">Restaurant Name</label>
    
     <div class="col-md-6">
                                <input id="input1" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="restaurant_name" value="{{ old('restaurant_name') }}" required autofocus>

                                @if ($errors->has('restaurant_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('restaurant_name') }}</strong>
                                    </span>
                                @endif
                            </div>
  
  <div class="form-group">
    <label for="forminput2">Address</label>
   <div class="col-md-6">
                                <input id="input2" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
  
  </div>
   <div class="form-group">
    <label for="forminput3">Category</label>
   <div class="col-md-6">
                                <input id="input3" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="categories" value="{{ old('categories') }}" required autofocus>

                                @if ($errors->has('categories'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categories') }}</strong>
                                    </span>
                                @endif
                            </div>
  
  </div>
<div class="col-md-6">

  <div class="form-group">
   <label for="forminput4">Phone Number</label>
   <div class="col-md-6">
                                <input id="input4" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
  
  </div>

   <div class="form-group">
    <label for="forminput5">Seating Capacity</label>
   <div class="col-md-6">
                                <input id="input5" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="seating_capacity" value="{{ old('seating_capacity') }}" required autofocus>

                                @if ($errors->has('seating_capacity'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('seating_capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
  
  </div>


   <div class="form-group">
    <label for="forminput6">Available Time</label>
   <div class="col-md-6">
                                <input id="input6" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="time" value="{{ old('time') }}" required autofocus>

                                @if ($errors->has('time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                            </div>
  
  </div>


  <div class="form-group">
    <label for="forminput7">Menu</label>
   <div class="col-md-6">
                                <input id="input7" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="image[]" value="{{ old('image') }}" required autofocus>

                               
                            </div>
  
  </div>
  <button type="submit" class="btn btn-primary">Submit</button></div>
</form>

@endsection
