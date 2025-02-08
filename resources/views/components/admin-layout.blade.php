<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>
<body class="bg-white min-h-screen">
    <div class="flex h-screen">
        @include('components.admin-sidebar')

        <div class="flex-1 flex flex-col">
            @include('components.admin-navbar') <!-- Ensure this line is present -->

            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content') <!-- Use yield to display the content of the page -->
            </main>
        </div>
    </div>
</body>
</html>