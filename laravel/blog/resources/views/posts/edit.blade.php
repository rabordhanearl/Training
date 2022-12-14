@extends('layouts.app')


@section('content')

    <h1>Edit Post</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\PostController@update', $post->id]]) !!}
        
    {{ csrf_field() }}
        <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('content', 'Content') !!}
            {!! Form::text('content', null, ['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('Update Post', ['class'=>'btn btn-info']) !!}

    {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\PostController@destroy', $post->id]]) !!}
        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}

    {!! Form::close() !!}

    
@endsection