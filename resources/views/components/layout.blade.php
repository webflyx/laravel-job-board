<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Job Board</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="mx-auto max-w-2xl mt-10 text-slate-800 bg-gradient-to-r from-blue-200 to-blue-300">

        <div class="flex justify-between items-center mb-10">
            <a class="text-xl font-semibold" href="{{ route('jobs.index') }}">Job Board</a>
            <div class="flex space-x-4 items-center">
                @auth
                    <div>{{ auth()->user()->name }}</div>
                    <form method="POST" action="{{ route('auth.destroy', auth()->user()->id) }}">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit">Logout</x-button>
                    </form>
                @else
                    <x-link-button href="{{ route('auth.create') }}">Login</x-link-button>
                @endauth
            </div>
        </div>

        {{ $slot }}
    </body>
</html>
