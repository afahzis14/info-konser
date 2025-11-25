<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Info Konser - Platform Informasi Konser & Musik Terlengkap')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Remix Icon -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @stack('styles')
    </head>
    <body class="text-gray-900 dark:text-gray-100 antialiased overflow-x-hidden relative">
        <!-- Retro Abstract Background -->
        <div class="fixed inset-0 z-0 bg-black">
            <!-- Orange gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-orange-900/30 via-black to-orange-800/20"></div>
            
            <!-- Abstract shapes -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                <!-- Large circle -->
                <div class="absolute -top-40 -right-40 w-96 h-96 bg-orange-600/10 rounded-full blur-3xl"></div>
                <div class="absolute top-1/4 -left-32 w-80 h-80 bg-orange-500/15 rounded-full blur-3xl"></div>
                <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-orange-700/10 rounded-full blur-3xl"></div>
                
                <!-- Geometric shapes -->
                <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-orange-600/5 transform rotate-45 blur-2xl"></div>
                <div class="absolute bottom-1/3 right-1/3 w-56 h-56 bg-orange-500/8 transform -rotate-12 blur-2xl"></div>
            </div>
            
            <!-- Retro pattern overlay -->
            <div class="absolute inset-0 opacity-5" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255, 140, 0, 0.1) 10px, rgba(255, 140, 0, 0.1) 20px);"></div>
            
            <!-- Noise texture -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\'0 0 400 400\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noiseFilter\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.9\' numOctaves=\'4\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noiseFilter)\'/%3E%3C/svg%3E');"></div>
        </div>

        <div class="relative z-10">
            @include('partials.navbar')

            <main class="pt-16">
                @yield('content')
            </main>
        </div>

        @include('partials.footer')

        @stack('scripts')
    </body>
</html>

