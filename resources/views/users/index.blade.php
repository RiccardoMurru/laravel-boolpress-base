@extends('templates.main')

@section('main-content')
<h1 class="text-center my-10 text-xl">Users</h1>
<div class="flex flex-wrap content-center">
    @foreach ($users as $user)
    <div class="max-w-sm rounded overflow-hidden shadow-lg my-5 mx-5 bg-white p-4">
        <h3 class="font-bold text-xl mb-2 text-gray-700">{{ $user->name }}</h3>
        <ul>
            <li class="mb-2 text-gray-600">{{ $user->email }}</li>
            <li class="mb-2 text-gray-600">{{ $user->info->address }}</li>
            <li class="mb-2 text-gray-500">{{ $user->info->phone }}</li>
        </ul>
    </div>
    @endforeach
</div>
@endsection