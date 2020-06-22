<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<header>
    <ul>
        <li>
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('users.index') }}">Users</a>
        </li>
        <li>
            <a href="{{ route('posts.index') }}">Posts</a>
        </li>
    </ul>
</header>

<body>