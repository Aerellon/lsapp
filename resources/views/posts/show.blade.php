@extends('layouts.app')

@section('content')
    <a href="/lsapp/public/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <img style="width:100%" src="/lsapp/public/storage/cover_images/{{ $post->cover_image }}">
        </div>
        <div class="col-md-8 col-sm-8">
            {!!$post->body!!}
        </div>
    </div>
    <hr>
    <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <!-- Edit Post -->
            <a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
            <!-- Delete Post -->
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::hidden('_method', 'DELETE') }}
            {!! Form::close() !!}
        @endif
    @endif
@endsection