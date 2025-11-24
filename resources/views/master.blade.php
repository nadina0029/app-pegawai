<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'App Pegawai')</title>

    {{-- Load Tailwind & CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Tailwind Plus (Optional, tapi kita pakai style manual agar lebih custom) --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>

<body class="flex flex-col min-h-screen relative overflow-x-hidden">

    {{-- Background Glow Decoration --}}
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-cyan-600/20 rounded-full blur-3xl"></div>
    </div>

    {{-- Navbar Glass --}}
    <nav class="sticky top-0 z-50 w-full border-b border-white/5 bg-slate-950/70 backdrop-blur-md">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">

                {{-- Logo (DIPERBARUI: Ikon Rumah) --}}
                <div class="flex items-center gap-3">
                    {{-- Ikon rumah di dalam kotak gradien --}}
                    <a href="{{ url('/') }}" class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30 transition hover:scale-110">
                        <i class="fas fa-house text-white text-lg"></i>
                    </a>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-2">
                        @php
                        $navs = [
                        ['name' => 'Employee', 'url' => '/employees'],
                        ['name' => 'Department', 'url' => '/departments'],
                        ['name' => 'Position', 'url' => '/positions'],
                        ['name' => 'Attendance', 'url' => '/attendances'],
                        ['name' => 'Salaries', 'url' => '/salaries'],
                        ['name' => 'Kalender', 'url' => route('events.index'), 'icon' => 'fas fa-calendar-alt'],
                        ];
                        @endphp

                        @foreach($navs as $nav)
                        <a href="{{ url($nav['url']) }}"
                            class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300
                           {{ (request()->is(trim($nav['url'], '/').'*') || request()->url() == $nav['url']) 
                               ? 'bg-white/10 text-white shadow-inner border border-white/5' 
                               : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                            @if(isset($nav['icon'])) <i class="{{ $nav['icon'] }} mr-1"></i> @endif
                            {{ $nav['name'] }}
                        </a>
                        @endforeach
                    </div>
                </div>

{{-- Profile Link (Direct ke Instagram) --}}
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        {{-- Ganti href dengan link Instagram kamu --}}
                        <a href="https://instagram.com/USERNAME_KAMU" target="_blank" 
                           class="flex items-center gap-3 group p-2 rounded-xl hover:bg-white/5 transition-all cursor-pointer">
                            
                            <div class="text-right hidden lg:block">
                                {{-- BAGIAN INI YANG DIUBAH --}}
                                <p class="text-sm font-bold text-white group-hover:text-indigo-400 transition-colors">
                                    NANAD
                                </p>
                                <p class="text-xs text-slate-400 group-hover:text-slate-300 transition-colors">
                                    App Creator & Developer
                                </p>
                            </div>

                            <div class="relative">
                                <img src="https://i.pinimg.com/736x/e1/40/0f/e1400f761873670001eb65b5fba5556f.jpg"
                                     class="h-10 w-10 rounded-full border-2 border-slate-700 group-hover:border-indigo-500 transition-all object-cover shadow-lg group-hover:shadow-indigo-500/20">
                                
                                {{-- Badge Ikon Instagram Kecil --}}
                                <div class="absolute -bottom-1 -right-1 bg-gradient-to-tr from-yellow-400 via-red-500 to-purple-500 w-5 h-5 rounded-full flex items-center justify-center border-2 border-slate-950">
                                    <i class="fab fa-instagram text-white text-[10px]"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Mobile Button --}}
                <div class="-mr-2 flex md:hidden">
                    <button type="button" command="--toggle" commandfor="mobile-menu"
                        class="inline-flex items-center justify-center rounded-md p-2 text-slate-400 hover:bg-white/10 hover:text-white">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <el-disclosure id="mobile-menu" hidden class="md:hidden bg-slate-900 border-b border-white/10">
            <div class="space-y-1 px-2 pt-2 pb-3">
                @foreach($navs as $nav)
                <a href="{{ url($nav['url']) }}" class="block rounded-md px-3 py-2 text-base font-medium text-slate-300 hover:bg-white/5 hover:text-white">
                    {{ $nav['name'] }}
                </a>
                @endforeach
            </div>
        </el-disclosure>
    </nav>

    {{-- Page Header --}}
    <header class="relative z-10 pt-8 pb-4">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white tracking-tight">
                @yield('page-title')
            </h1>
            <div class="h-1 w-20 bg-indigo-500 mt-2 rounded-full"></div>
        </div>
    </header>

    {{-- Main Content --}}
    <main class="flex-grow relative z-10">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="border-t border-white/5 bg-slate-950 py-6 mt-auto">
        <div class="text-center text-slate-500 text-sm">
            &copy; {{ date('Y') }} <span class="text-indigo-500 font-medium">App Pegawai</span>. Crafted with <i class="fas fa-heart text-red-500 mx-1"></i> for excellence.
        </div>
    </footer>

    @stack('scripts')
</body>

</html>