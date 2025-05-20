<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Replecs</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-20 bg-green-600 flex flex-col items-center py-6 space-y-6 rounded-tr-3xl rounded-br-3xl shadow-lg">
        <div class="bg-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-green-600 text-sm">logo</div>
        <a href="#" class="text-white text-xl"><i class="fas fa-home"></i></a>
        <a href="#" class="text-white text-xl"><i class="fas fa-table"></i></a>
        <a href="#" class="text-white text-xl"><i class="fas fa-info-circle"></i></a>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-green-800">Replecs</h1>

            <!-- Search -->
            <div class="relative w-72">
                <input type="text" placeholder="Search tables"
                    class="w-full py-2 pl-10 pr-4 rounded-full bg-green-500 text-white placeholder-white shadow focus:outline-none focus:ring-2 focus:ring-green-700">
                <div class="absolute left-3 top-2.5 text-white">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>

        <!-- Grid Content -->
        <div class="grid grid-cols-2 gap-6">
            @for ($i = 0; $i < 4; $i++)
                <div class="bg-gray-200 h-40 rounded-lg flex items-center justify-center text-lg font-semibold">
                    isi konten apa aja
                </div>
            @endfor
        </div>
    </main>
</div>

</body>
</html>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'green-500': '#4CAF50',
                    'green-600': '#1D976C',
                    'green-700': '#2E7D32',
                    'green-800': '#1B5E20',
                }
            }
        }
    }
</script>