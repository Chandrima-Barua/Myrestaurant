@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                   
                 <div > 

       <?php $i=0 ?>
       @foreach ($posts as $post)
       <?php $i++ ?>
        
   
        <p>{{$i}}</p>
        <form method="POST" action="{{ route('post.approval', $post->id)}}">
  
     
         <div class="form-group col-md-4" style="float: right">
                <lable>Approval</lable>
                <select name="approve">
                  <option value="0" @if($post->approve==0)selected @endif>Pending</option>
                  <option value="1" @if($post->approve==1)selected @endif>Approve</option>
                 
                </select>
          </div>
          <br>
             {{csrf_field() }}
         <div style="float: right">
          <input type="hidden"  name="approve"  value="$post->id">
              
                <button type="submit" class="btn btn-primary" name="approve" >Approve</button></div>
        
           <div class="button"> 
                            

              <a class="btn btn raised btn-danger btn-sm" href="{{ route('admin_post', $post->id)}}"><i class="fas fa-trash"></i></a>
        </div>
        

        </form>
        <p> Created By <strong>{{$post->restaurant_name}}</strong> </p>
        <b> Subject:</b> {{ $post->subject}}
        <br>
        <b>Post:</b> <div>{{ $post->body }}</div><br>
        
        <br><br>
        <?php
          $imgex = explode(';', $post->image);
          for($j = 0; $j < sizeof($imgex) - 1; $j ++)
          {
        ?>
        <img src="{{ asset('images/' . $imgex[$j])}}" height="200" width="400"> 
        <?php
          }
        ?>
        <p><b> Created at :</b> {{$post->created_at}}</p>
        <p><b> Updated at :</b> {{$post->updated_at}}</p>
      @endforeach
     <br><br>
    </div>

                </div>
               
                
            </div>
             
        </div>
    </div>
</div>
@endsection
