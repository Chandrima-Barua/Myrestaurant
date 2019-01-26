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
     <div class="card-header "><h3><b>Restaurant List Dashboard</b></h3></div>
    <br><br>



    <form action="{{route('restaurant-search')}}" method="GET" class="search-form">
      <input type="text" name="query" id="query" value="{{ request()->input('query')}}" placeholder="Search Category">
      

    </form> 
    
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
<!--{{ $owner->links() }}-->


           <div class="card-header" >
              <ul class="navbar-nav">
                    <li class="nav-item active">
         <a class="nav-link" href="/customer"><h4><b>Home</b> </h4><span class="sr-only">(current)</span></a>
      </li>
                  <li class="nav-item">
                       <a class="nav-link" href="{{ route('cus-post') }}"><h4><b>Post</b></h4></a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('show') }}"><h4><b> See Posts</b></h4></a>
                   </li>
                    
              </ul>
            </div>
      

 

  
     
  
  </div>
</div>
</div>
@endsection
<style type="text/css">

body{
  background-color: #b3ffd7;
}
    .post{
        margin-bottom: 20px;
        margin-top: 20px;
        width: 100%;
        height: 300px;
        border: 2px solid;
        margin-right: 100px;
    }

    h4{
       margin-top: 40px;
    }
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
    
</style>