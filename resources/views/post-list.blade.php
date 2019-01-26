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


 
           <div class="card-header" >
              <ul class="navbar-nav">
                  
                  <li class="nav-item">
                       <a class="nav-link" href="{{ route('post') }}"><h3><b style="color: #black;">Post</b></h3></a>
                   </li>
                   
              </ul>
            </div>
     

      <div > 

       <?php $i=0 ?>
       @foreach ($posts as $post)
       <?php $i++ ?>

    <div class="post"> 

        <div class="button"> 
              <a class="btn btn raised btn-primary btn-sm" href="{{route('post_edit', $post->id)}}"><i class="fas fa-pencil-alt"></i></a>               

              <a class="btn btn raised btn-danger btn-sm" href="{{ route('post_delete', $post->id)}}"><i class="fas fa-trash"></i></a>
        </div>
        <p>{{$i}}</p>
        <p> Created By <strong>{{$post->restaurant_name}}</strong> </p>
        <b> Subject:</b> {{ $post->subject}}
        <br>
        <b>Post:</b> <div>{{ $post->body }}</div><br>
        <b>Post Approval:
         @if  ($post->approve == 1)
          <span class="badge bg-blue">
           <h5> Approved</h5>
          </span>
          
          @endif
        <br><br>
        <a href="#"><img src="{{ asset('images/' . $post->image)}}" height="200" width="400"></a>
        <p><b> Created at :</b> {{$post->created_at}}</p>
        <p><b> Updated at :</b> {{$post->updated_at}}</p>
       
    </div>
     
      <div class="comment">
        @foreach($post->comments as $comment)
<div>

             
                 {{$comment->comment }}
                 <div class="button">
                  <b> Commented by {{ $comment->user->restaurant_name }}</b>
  
              <a class="btn btn raised btn-primary btn-sm" href="{{route('comment_edit', $comment->id)}}"><i class="fas fa-pencil-alt"></i></a>               

              <a class="btn btn raised btn-danger btn-sm" href="{{ route('comment_delete', $comment->id)}}"><i class="fas fa-trash"></i></a>
        </div>
                
  
</div>
@endforeach
    <br><br>        
    </div>  
              
<form method="POST" action="{{ route('store_comment', $post->id )}}"> 
        {{csrf_field() }}
             
               <textarea id="input1" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="comment" value="{{ old('commnet') }}" required autofocus> </textarea>

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
        width: 100%;
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