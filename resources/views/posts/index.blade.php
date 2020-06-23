@extends('templates.main')

@section('main-content')
<h1 class="text-center my-10 text-xl">Posts</h1>
{{ $posts->links()}}

@foreach ($posts as $post)
<div class="w-4/5 rounded overflow-hidden shadow-lg my-5 mx-auto bg-white p-4">
    <h2 class="text-xl">Title: {{ $post->title }}</h2>
    <h3 class="text-lg">Author: {{ $post->user->name }}</h3>
    <h4 class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Category:
        {{ $post->category }}</h4>
    <p class="my-5">{{ $post->body }}</p>
    <h3 class="font-bold">Comments:</h3>
    @forelse ($post->comments as $comment)
    <div class="w-4/5 rounded overflow-hidden shadow-lg my-5 mx-auto bg-white p-4">
        <h4 class="font-semibold text-gray-700">{{ $comment->user->name}} says:</h4>
        <p class="my-3">{{ $comment->body}}</p>
        <span>At: {{ $comment->created_at}}</span>
    </div>

    @empty
    <p>No comments yet.</p>
    @endforelse
</div>
@endforeach


{{ $posts->links()}}
@endsection