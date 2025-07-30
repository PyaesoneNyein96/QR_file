<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: true }" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'Dashboard')
        - Dashboard
    </title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex h-full bg-gray-100">

    <!-- Sidebar -->
    @include('dashboard.components.sidebar') <!-- Include the sidebar component -->

    <!-- Main content -->
    <div :class="sidebarOpen ? '' : ''" class="flex-1 transition-all ">
        @include('dashboard.components.header') <!-- Include the header component -->

        <main class="p-6 ">
            @yield('content')
        </main>
    </div>

</body>

</html>
