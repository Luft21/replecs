<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Replecs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @livewireStyles
</head>
<body class="font-sans antialiased bg-[#121212] text-white">
    <div class="grid [grid-template-columns:0.5fr_repeat(4,_1fr)] [grid-template-rows:0.5fr_repeat(4,_1fr)] min-h-screen">

        {{-- Navbar (div1) --}}
        <div class="col-span-5 row-start-1 row-end-2 flex items-center px-20 pt-6 bg-[#121212]">
            <div class="w-12 h-12 bg-gradient-to-br from-[#1D976C] to-[#093123] rounded-full"></div>
            <h1 class="ml-4 text-2xl font-bold bg-gradient-to-r from-[#1D976C] to-[#093123] bg-clip-text text-transparent">Replecs</h1>    
                <a href="{{ url('/auth') }}" class="ml-auto">
                <button class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white rounded-lg shadow transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="hidden sm:inline" style="font-family: 'Outfit', sans-serif;">Log In</span>
                </button>
                </a>
        </div>

    {{-- Sidebar (div2) --}}
    <div class="col-start-1 col-end-2 row-start-2 row-end-6 flex justify-center items-center pt-10 bg-[#121212]">
        <div class="w-20 bg-[#1e1e1e] rounded-2xl flex flex-col items-center justify-center py-10 space-y-15 shadow-lg">
            <i class="fas fa-home text-2xl text-[#93F9B9]"></i>
            <i class="fas fa-file-alt text-2xl text-[#93F9B9]"></i>
            <i class="fas fa-table text-2xl text-[#93F9B9]"></i>
            <i class="fas fa-info-circle text-2xl text-[#93F9B9]"></i>
        </div>
    </div>


        {{-- Main Content (div3) --}}
        <div class="flex items-center justify-center col-start-2 col-end-6 row-start-2 row-end-6 px-6 py-4">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>
</html>