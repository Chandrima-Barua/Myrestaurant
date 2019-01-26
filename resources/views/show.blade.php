@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="col-sm-9">
            <div class="panel panel-default" style="margin: 0; border-radius: 0;">
              <div class="panel-heading">
                <h3 class="panel-title">
                    {{ $post->title }}
                    <div class="pull-right">
                        <a href="{{ url('/post') }}">Return back</a>
                    </div>
                </h3>
              </div>
              <div class="panel-body">
                {{ $post->body }}
	     </div>
                  
              </div>
            </div>
            @foreach ($post->comments as $comment)
                <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                  <div class="panel-body">
                      <div class="col-sm-9">
                          {{ $comment->comment }}
                      </div>
                      <div class="col-sm-3 text-right">
                          <small>Commented by {{ $comment->user->name }}</small>
                          <div class="pull-right">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <span class="caret"></span>
                                                    </a>

                                                    <ul class="dropdown-menu" role="menu">
                                                         <li><a href="{{ route('comment.edit', [$comment->id]) }}">Edit Comment</a></li>
                                                        <li>
                                                            <a href="#" onclick="document.getElementById('delete').submit()">Delete Comment</a>
                                                            {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['comment.delete', $comment->id]]) !!}
                                                            {!! Form::close() !!}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            @endforeach
            @if (Auth::check())
                <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                  <div class="panel-body">
                      <form action="{{ url('/Comment') }}" method="POST" style="display: flex;">
                          {{ csrf_field() }}
                          <input type="hidden" name="post_id" value="{{ $post->id }}">
                          <input type="text" name="comment" placeholder="Enter your Comment" class="form-control" style="border-radius: 0;">
                          <input type="submit" value="Comment" class="btn btn-primary" style="border-radius: 0;">
                      </form>
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert">&times;</a>
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      {{ $error }}
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      @if (Session::has('success'))
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert">&times;</a>
                              {{ Session::get('success') }}
                          </div>
                      @endif
                  </div>
                </div>
            @endif
        </div>
    </div>
@endsection
