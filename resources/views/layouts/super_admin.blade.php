<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- title --}}

    <title>@yield('title')</title>

    {{-- style --}}

    @stack('style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    {{-- header --}}
    <x-general.header />

    <div class=" flex">

        {{-- aside --}}
        <x-general.aside />

        {{-- content --}}
        <main class=" h-screen w-full ml-64 mt-20">
            @yield('content')
        </main>

    </div>


    {{-- js --}}

    @stack('js')
    @vite(['resources/js/header.js'])
</body>

</html>
