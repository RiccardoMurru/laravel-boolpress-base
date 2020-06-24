@extends('templates.main')

@section('main-content')
@if (session('post_success'))
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
    <p class="font-bold">Success</p>
    <p class="text-sm">New post created.</p>
</div>

@endif
<h1 class="text-center my-10 text-xl">Posts</h1>
<div class="flex justify-center">
    <a class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
        href="{{ route('posts.create') }}">New Post</a>
</div>

{{ $posts->links()}}
@foreach ($posts as $post)
<div class="w-4/5 rounded overflow-hidden shadow-lg my-5 mx-auto bg-white p-4">
    <h2 class="text-xl">Title: {{ $post->title }}</h2>
    <h3 class="text-lg">Author: {{ $post->user->name }}</h3>
    <h4 class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">Category:
        {{ $post->category }}</h4>
    <p class="my-5">{{ $post->body }}</p>
    <a class="text-teal-600" href="{{ route('posts.show', $post->slug) }}">Read more</a>
</div>
@endforeach


{{ $posts->links()}}
@endsection