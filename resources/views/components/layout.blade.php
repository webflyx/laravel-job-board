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
                <div class="font-semibold">{{ auth()->user()->name }}</div>
                <a href="{{ route('my-job-application.index') }}">My Job Applications</a>
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

    @if (session('success'))
        <div class="border border-l-4 mb-6 rounded-md border-green-600 bg-green-200 px-4 py-2">
            <div class="text-lg font-medium">Success!</div>
            <div>Job application submitted.</div>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
