@extends('layouts.app')


@section('content')

    <ul>
        @foreach ($posts as $post)
            <div class="image-container">

                <img height="100" src="{{ $post->path }}" alt="">
            </div>
            <li>
               <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }} --  {{ $post->content }}</a>
            </li>
        @endforeach
    </ul>

    
@endsection