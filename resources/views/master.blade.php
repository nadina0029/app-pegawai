<!DOCTYPE html>
<html lang="en" class="bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>

    {{-- Load Tailwind --}}
    @vite('resources/css/app.css')

    {{-- Tailwind Plus Elements --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen text-gray-100">

    {{-- Navbar --}}
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                {{-- Logo dan Menu --}}
                <div class="flex items-center">
                    <div class="shrink-0">
                        <a href="{{ url('/') }}">
                            <i class="fas fa-home text-2xl text-white"></i>
                        </a>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ url('/employees') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Employee</a>
                            <a href="{{ url('/departments') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Department</a>
                            <a href="{{ url('/positions') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Position</a>
                            <a href="{{ url('/attendances') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Attendance</a>
                            <a href="{{ url('/salaries') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Salaries</a>
                        </div>
                    </div>
                </div>

                {{-- Dropdown Profil --}}
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <el-dropdown class="relative ml-3">
                            <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                <span class="sr-only">Open user menu</span>
                                <img src="https://i.pinimg.com/736x/e1/40/0f/e1400f761873670001eb65b5fba5556f.jpg"
                                    alt="Profile" class="size-8 rounded-full outline -outline-offset-1 outline-white/10">
                            </button>

                            <el-menu anchor="bottom end" class="w-48 origin-top-right rounded-md bg-gray-800 py-1 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete data-closed:scale-95 data-closed:opacity-0">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5">Sign Out</a>
                            </el-menu>
                        </el-dropdown>
                    </div>
                </div>

                {{-- Tombol menu mobile --}}
                <div class="-mr-2 flex md:hidden">
                    <button type="button" command="--toggle" commandfor="mobile-menu"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile menu --}}
        <el-disclosure id="mobile-menu" hidden class="block md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <a href="{{ url('/employees') }}" class="block rounded-md bg-gray-950/50 px-3 py-2 text-base font-medium text-white">Employee</a>
                <a href="{{ url('/departments') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Department</a>
                <a href="{{ url('/positions') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Position</a>
                <a href="{{ url('/attendances') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Attendance</a>
                <a href="{{ url('/salaries') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Salaries</a>
            </div>
        </el-disclosure>
    </nav>

    {{-- Header --}}
    <header class="bg-gray-200 border-y border-white/10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-black">@yield('page-title', 'Dashboard')</h1>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="flex-grow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    {{-- Sticky Footer --}}
    <footer class="bg-gray-800 py-4 sticky bottom-0 z-10">
        <div class="text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} App Pegawai — All rights reserved.
        </div>
    </footer>

</body>
</html>