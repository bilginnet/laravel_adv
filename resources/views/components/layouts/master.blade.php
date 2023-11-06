<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="font-sans text-gray-900 antialiased">
    <form id="login-form" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>

        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    @if(Route::currentRouteName() != 'advertising.create')
                        <a href="{{ route('advertising.create') }}" class="font-semibold text-gray-600">New</a>
                    @endif

                    @if(Route::currentRouteName() != 'advertising.index')
                        <a href="{{ url('/') }}" class="font-semibold text-gray-600">Home</a>
                    @endif

                    <a onclick="document.getElementById('login-form').submit()" href="javascript:void(0);" class="font-semibold text-gray-600">Logout</a>
                @else
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    {{ $slot }}
</div>
</body>
</html>
