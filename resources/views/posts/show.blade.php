@extends('templates.main')

@section('main-content')
@if (session('post_success'))
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
    <p class="font-bold">Success</p>
    <p class="text-sm">New post {{ session('post_success') }} created.</p>
</div>

@endif
<h1 class="text-center my-10 text-xl">Posts</h1>
<div class="flex justify-around">
    <a class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
        href="{{ route('posts.create') }}">New Post</a>
    <a class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
        href="{{ route('posts.index') }}">Back to Archive</a>
</div>

<div class="w-4/5 rounded overflow-hidden shadow-lg my-5 mx-auto bg-white p-4">
    <h2 class="text-xl">Title: {{ $post->title }}</h2>
    <h3 class="text-lg">Author: {{ $post->user->name }}</h3>
    <div class="my-3">
        Category:

        @forelse ($post->tags as $tag)
        <span class="inline-block bg-teal-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-100 mr-2">
            #{{ $tag->name }}
        </span>
        @empty
        <span>No categories yet</span>
        @endforelse
    </div>

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

@endsection