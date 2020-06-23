@extends('templates.main')

@section('main-content')
<h1>Posts</h1>
<div>
    @foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <h3>Author: {{ $post->user->name }}</h3>
    <h4>Category: {{ $post->category }}</h4>
    <p>{{ $post->body }}</p>
    <h3>Comments:</h3>
    @forelse ($post->comments as $comment)
    <div>
        <h4>{{ $comment->user->name}} says:</h4>
        <p>{{ $comment->body}}</p>
        <span>At: {{ $comment->created_at}}</span>
    </div>

    @empty
    <p>No comments yet.</p>
    @endforelse
    @endforeach
</div>

{{ $posts->links()}}
@endsection