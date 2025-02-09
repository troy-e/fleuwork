<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        @include('components.admin-sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col ml-64"> <!-- Add ml-64 to match sidebar width -->
            <!-- Navbar -->
            @include('components.admin-navbar')

            <!-- Main Content -->
            <main class="flex-1 p-6 overflow-y-auto mt-16"> <!-- Add mt-16 for navbar height -->
                @isset($slot)
                {{ $slot }}
            @else
                <x-main></x-main>
            @endisset
        </div>
    </div>
</body>
</html>
