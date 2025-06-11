<div class="bg-[#121212] text-white p-4 sm:p-8 font-sans">

    {{-- Pastikan Font Awesome disertakan dalam file layout utama Anda untuk ikon medali --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" /> --}}

    @if ($mainProduct)
        <!-- Tampilan Produk Utama -->
        <div class="max-w-7xl mx-auto bg-[#1a1a1a] p-6 rounded-lg shadow-2xl mb-12">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Gambar Produk -->
                <div class="w-1/2 md:w-3/5 flex-shrink-0">
                    <img src="{{ asset('storage/' . $mainProduct['image']) }}" 
                         alt="{{ $mainProduct['name'] }}" 
                         class="w-full h-auto object-cover rounded-md shadow-lg">
                </div>
                
                <!-- Detail Produk -->
                <div class="w-full md:w-2/5 flex flex-col justify-center">
                    <h1 class="text-3xl lg:text-4xl font-bold text-white mb-8">
                        {{ $mainProduct['name'] }}
                        <span class="text-green-400">({{ number_format($mainProduct['Qi'], 4) }} Score)</span>
                    </h1>

                    <div class="space-y-5">
                        @foreach ($mainProduct['criteria'] as $index => $nilai)
                            <div class="flex items-center justify-between">
                                <p class="text-gray-300 text-lg">Kriteria {{ $kriterias[$index]['nama']}}</p>
                                <div>
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $nilai)
                                            <svg class="inline w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,6.99 19,7.64 14,12.26 15.18,18.51 10,15.27 4.82,18.51 6,12.26 1,7.64 7.41,6.99"/></svg>
                                        @else
                                            <svg class="inline w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,6.99 19,7.64 14,12.26 15.18,18.51 10,15.27 4.82,18.51 6,12.26 1,7.64 7.41,6.99"/></svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeri 4 Laptop Teratas (Index 1-4) -->
<div class="max-w-5xl mx-auto">
    <h2 class="text-2xl font-bold text-center text-white mb-8">Top 2-5 Recommendations</h2>
    
    <div class="flex flex-row justify-center gap-4">

    @foreach ($topProducts as $index => $product)
        @if ($index >= 1 && $index <= 4)
            <div class="w-1/4 relative cursor-pointer group transform hover:-translate-y-2 transition-transform duration-300">
                
                <img src="{{ asset('storage/' . $product['image']) }}" 
                     alt="{{ $product['name'] }}"
                     class="rounded-lg object-cover w-full h-32 md:h-40 border-2 {{ $mainProduct['name'] === $product['name'] ? 'border-[#1D976C]' : 'border-transparent' }} group-hover:border-[#1D976C] transition-all duration-300">
                
                <div class="mt-2 text-center">
                    <p class="font-bold text-sm truncate">{{ $product['name'] }}</p>
                    <p class="text-xs text-gray-400">Score: {{ number_format($product['Qi'], 4) }}</p>
                </div>
            </div>
        @endif
    @endforeach
    </div>
</div>

    @else
        <div class="text-center py-20">
            <p class="text-gray-400 text-xl">Tidak ada produk yang ditemukan untuk sesi ini.</p>
        </div>
    @endif
</div>
