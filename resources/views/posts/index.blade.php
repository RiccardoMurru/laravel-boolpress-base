@extends('templates.main')

@section('main-content')
<h1>Posts</h1>
<div>
    @foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <h3>Author: {{ $post->user->name }}</h3>
    <h4>Category: {{ $post->category }}</h4>
    <p>{{ $post->body }}</p>
    @endforeach
</div>

{{ $posts->links()}}
@endsection