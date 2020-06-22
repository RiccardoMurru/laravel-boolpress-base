@extends('templates.main')

@section('main-content')
<h1>Users</h1>
<div>
    @foreach ($users as $user)
    <h3>{{ $user->name }}</h3>
    <ul>
        <li>{{ $user->email }}</li>
        <li>{{ $user->info->address }}</li>
        <li>{{ $user->info->phone }}</li>
    </ul>
    @endforeach
</div>
@endsection