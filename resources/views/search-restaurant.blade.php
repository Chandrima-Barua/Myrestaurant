@extends('layouts.cus-app')

@section('content')
<div class="search-results-container container">
       
        <div class="search-results-container container">
        <h1>Search Results</h1>
        <p class="search-results-count">{{ $owner->count() }} result(s) for '{{ request()->input('query') }}'</p></div>

       <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Restaurant Name</th>
      <th scope="col">Address</th>
      <th scope="col">Categories</th>
     

    </tr>
  </thead>
  <tbody>
    <tr>
      
       <?php $i = 0 ?>
       @foreach ($owner as $data)
       <?php $i++ ?>
      
      <td> {{$i}}</td>
      <td> <a  href="{{ route('profile-show', $data->id)}}"> {{ $data->restaurant_name}}</a></td>
      <td>{{ $data->address}} </td>
      <td>{{ $data->categories }} </td>
      </tr>
   
   @endforeach 


   
  </tbody>

</table>


</div>
@endsection
