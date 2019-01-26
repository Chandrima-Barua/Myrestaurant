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


           <div class="card-header" >
              <ul class="navbar-nav">
                  
                  <li class="nav-item">
                       <a class="nav-link" href="{{ route('cus-post') }}"><h3><b>Post</b></h3></a>
                   </li>
                    <li class="nav-item ">
         <a class="nav-link" href="/customer"><h3><b>Home</b></h3></a>
      </li>
                   
              </ul>
            </div>
      

      <div> 

       <?php $i=0 ?>
       @foreach ($customer_posts as $customer_post)
       <?php $i++ ?>

     <div class="post">
      <div class="button"> 
              <a class="btn btn raised btn-primary btn-sm" href="{{route('cus-post-edit', $customer_post->id)}}"><i class="fas fa-pencil-alt"></i></a>               

              <a class="btn btn raised btn-danger btn-sm" href="{{ route('cus-post-delete', $customer_post->id)}}"><i class="fas fa-trash"></i></a>
        </div>

        <b>{{$i}}</b><br>
         Created By <strong>{{$customer_post->name}}</strong><br>
        <b>Post:</b> {{ $customer_post->body }}
        <br>
          <img src="{{ asset('images/' . $customer_post->image)}}" height="100" width="200"> 
        <br>
        <b> Created at :</b> {{$customer_post->created_at}}<br>
        <b> Updated at :</b> {{$customer_post->updated_at}}
       
    </div>

 

<div class="comment">
        @foreach($customer_post->comments as $comment)
<div>

             
                 {{$comment->comment }}
                 <div class="button">
                   Commented by <b>{{ $comment->name }}</b>
  
              <a class="btn btn raised btn-primary btn-sm" href="{{route('cus-comment-edit', $comment->id)}}"><i class="fas fa-pencil-alt"></i></a>               

              <a class="btn btn raised btn-danger btn-sm" href="{{ route('cus-comment-delete', $comment->id)}}"><i class="fas fa-trash"></i></a>
        </div>
                
  
</div>
@endforeach
    <br><br>        
    </div>  
              
<form method="POST" action="{{ route('cus-store-comment', $customer_post->id )}}"> 
        {{csrf_field() }}

<div class="comment">
         <input id="name" type="text" placeholder=" Name:"  name="name" value="{{ old('name') }}" required autofocus>
    <br>
                          
               <textarea id="input1" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="comment" value="{{ old('commnet') }}" required autofocus> </textarea>
             </div>

                  <button type="submit" class="btn btn-primary">Comment</button>
                 
                 </form>
      
        @endforeach
 </div> 

</div>
</div>
@endsection
<style type="text/css">
    .post{
        border: 2px solid;
    }

    .comment{
        border: 2px solid;
       
        text-align: left;
        font-size: 20px;
        color:black solid;
    }
    .button{
        float: right;
    }
</style>