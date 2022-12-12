@extends('layouts.app')


@section('content')

<h1>Create Post</h1>

    <form method="POST" action="/posts">
    @csrf
        <input type="text" name="title" placeholder="Enter Title">
        <input type="text" name="content" placeholder="Enter Content">
        <input type="submit" class="submit">
    </form>





    
@endsection