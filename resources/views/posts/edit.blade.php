@extends('templates.main')

@section('main-content')
@if ($errors->any())
<div role="alert">
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Error
    </div>
    @foreach ($errors->all() as $error)
    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        <p>{{ $error }}</p>
    </div>
    @endforeach
    @endif
</div>

<form class="flex flex-col w-1/2 mx-auto mt-5" class="w-full" action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="inline-block relative w-64">
        <select id="user_id" name="user_id"
            class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline my-2">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2"
        id="title" name="title" type="text" placeholder="Post Title" value="{{ old('title', $post->title)}}">
    <textarea
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline my-2"
        name="body" id="body" cols="30" rows="10" placeholder="New post here">{{ old('body', $post->body)}}</textarea>
    <div class="flex justify-around">
        @foreach ($tags as $tag)
        <div>
            <input type="checkbox" name="tags[]" id="tag-{{ $loop->iteration }}" value="{{ $tag->id }}" 
            @if($post->tags->contains($tag->id))
                checked
            @endif>
            <label for="ag-{{ $loop->iteration }}">{{ $tag->name }}</label>
        </div>
        @endforeach
    </div>
    <input type="submit"
        class="inline-block w-1/4 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded my-3"
        value="Edit Post">
    </input>
</form>
@endsection