<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header>
        <ul class="flex justify-around items-center bg-teal-800 p-5">
            <li>
                <a class="text-blue-300" href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a class="text-blue-300" href="{{ route('users.index') }}">Users</a>
            </li>
            <li>
                <a class="text-blue-300" href="{{ route('posts.index') }}">Posts</a>
            </li>
        </ul>
    </header>