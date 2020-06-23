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

<form class="w-full" action="{{ route('posts.store') }}" method="POST">
    @csrf
    @method('POST')
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="title" name="title" type="text" placeholder="Post Title">
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="category" name="category" type="text" placeholder="Category">
    <textarea name="body" id="body" cols="30" rows="10" placeholder="New post here"></textarea>
    <div class="inline-block relative w-64">
        <select id="user_id" name="user_id"
            class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            @foreach ($users as $user)
            <option value="{{ $user->id}}"> {{ $user->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit"
        class="inline-block bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
        value="New Post">
    </input>
</form>
@endsection