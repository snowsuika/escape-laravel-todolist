<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="px-8 py-6 bg-indigo-200 overflow-hidden shadow sm:rounded-lg">
            <h1 class="font-semibold text-5xl">TODO LIST</h1>
        </div>

        @if (Route::has('login'))
            <div class="flex justify-end px-6 py-4">
                @auth
                    <a href="{{ url('/todolist') }}" class="text-sm underline">進入!</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm underline">登入</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm underline">註冊</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>
</body>
</html>
