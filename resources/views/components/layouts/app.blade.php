<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Replecs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome (ikon sidebar) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-[#121212] text-white flex flex-col">

        {{-- Navbar --}}
        <div class="w-full h-16 bg-[#121212] flex items-center px-14 pt-6">
            {{-- Logo Circle --}}
            <div class="w-12 h-12 bg-gradient-to-br from-[1D976C] to-green-600 rounded-full"></div>
            <h1 class="ml-4 text-2xl font-bold text-green-400">Replecs</h1>
        </div>

        {{-- Main Layout --}}
        <div class="flex flex-1 relative">
            <div class="absolute top-1/2 -translate-y-1/2 left-10">
                <div class="w-20 bg-[#1e1e1e] rounded-2xl flex flex-col items-center py-20 space-y-6 shadow-lg gap-10">
                    <i class="fas fa-home text-xl"></i>
                    <i class="fas fa-file-alt text-xl"></i>
                    <i class="fas fa-table text-xl"></i>
                    <i class="fas fa-info-circle text-xl"></i>
                </div>
            </div>
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>
</html>
