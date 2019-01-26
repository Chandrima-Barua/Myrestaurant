@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       
                        Welcome {{ Auth::user()->restaurant_name }}
                    </h3>
                </div>
                <div class="panel-body">
                    <div>
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#posts" aria-controls="posts" role="tab" data-toggle="tab">Your Posts</a></li>
                       
                        
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active fade in" id="posts">
                                {{ Auth::user()->posts()->count() }} Posts created
                                @foreach (Auth::user()->posts as $post)
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">
                                        {{ $post->subject }}
                                        <div class="pull-right">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ route('post.show', [$post->id]) }}">Show Post</a></li>
                                                    <li><a href="{{ route('post.edit', [$post->id]) }}">Edit Post</a></li>
                                                    <li>
                                                        <a href="#" onclick="document.getElementById('delete').submit()">Delete Post</a>
                                                        {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['post.delete', $post->id]]) !!}
                                                        {!! Form::close() !!}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    {{ $post->body }}
                                    <br />
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                      
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">
                                    Created by {{ $post->user->restaurant_name }}, {{ $post->sunject }}
                                    <div class="pull-right">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ route('post.show', [$post->id]) }}">Show Post</a></li>
                                                <li><a href="{{ route('post.edit', [$post->id]) }}">Edit Post</a></li>
                                                <li>
                                                    <a href="#" onclick="document.getElementById('delete').submit()">Delete Post</a>
                                                    {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['post.delete', $post->id]]) !!}
                                                    {!! Form::close() !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </h3>
                            </div>
                                     
                                     
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
