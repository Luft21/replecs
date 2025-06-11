<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Replecs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">    @livewireStyles
</head>
<body class="font-sans antialiased bg-[#121212] text-white h-screen overflow-hidden">
        {{ $slot }}
    @livewireScripts
</body>
</html>