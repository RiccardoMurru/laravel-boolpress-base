@extends('templates.main')

@section('main-content')
@if (session('post_success'))
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
    <p class="font-bold">Success</p>
    <p class="text-sm">New post created.</p>
</div>

@endif
<h1 class="text-center my-10 text-xl">Posts</h1>
<a class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
    href="{{ route('posts.create') }}">New Post</a>

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