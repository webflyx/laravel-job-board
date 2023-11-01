<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Job Board</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="mx-auto max-w-2xl mt-10 text-slate-800 bg-gradient-to-r from-blue-200 to-blue-300">
        {{ $slot }}
    </body>
</html>
