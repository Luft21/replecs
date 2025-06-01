<div>
    <style>
        /* Hide scrollbar but allow scroll */
        .scrollbar-hidden {
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE and Edge */
        }
        .scrollbar-hidden::-webkit-scrollbar {
            display: none; /* Chrome, Safari */
        }
    </style>

    <div class="flex h-screen text-white">
        <!-- Sidebar -->
        <div id="sidebar" class="w-1/4 bg-[#1a1a1a] p-4 overflow-y-auto scrollbar-hidden relative">
            <div class="relative space-y-4 pr-4">
                <div class="absolute top-0 bottom-0 right-0 w-1 bg-[#1D976C] rounded-full opacity-75"></div>

                @foreach ($products as $index => $product)
                    <div wire:key="product-{{ $index }}" wire:click="selectProduct({{ $index }})" class="cursor-pointer relative z-10">
                        <img src="{{ asset('images/' . $product['image']) }}"
                            alt="{{ $product['name'] }}"
                            class="rounded-md border-2 transition-all duration-300 {{ isset($selectedProduct) && $selectedProduct['name'] === $product['name'] ? 'border-[#1D976C]' : 'border-transparent' }}">
                        <p class="text-center mt-1 font-semibold">{{ $index + 1 }}. {{ $product['name'] }}</p>
                        <p class="text-center text-sm text-gray-400">Score: {{ number_format($product['Qi'], 4) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Detail Section -->
        <div class="w-3/4 p-6 bg-[#121212] overflow-y-auto scrollbar-hidden">
            @if (isset($selectedProduct))
                <img src="{{ asset('images/' . $selectedProduct['image']) }}" 
                    alt="{{ $selectedProduct['name'] }}" 
                    class="w-1/2 h-auto mx-auto mb-4 rounded shadow-lg">

                <h2 class="text-3xl font-bold text-gradient-to-r from-[#1D976C] to-[#093123]  text-center">{{ $selectedProduct['name'] }}</h2>

                <div class="mt-2 text-center text-gray-400">
                    Final Score (Qi): {{ number_format($selectedProduct['Qi'], 4) }}
                </div>

                <div class="mt-6 space-y-4">
                   @foreach ($selectedProduct['normalized'] as $index => $normalizedValue)
                    <div>
                        <p class="mb-1">Kriteria {{ $index + 1 }} (Asli: {{ $selectedProduct['criteria'][$index] }}, Ternormalisasi: {{ number_format($normalizedValue, 2) }})</p>
                            <div class="w-full h-3 bg-gradient-to-r from-[#1f1f1f] via-[#1f1f1f] to-gray-800 rounded">
                                <div class="h-3 bg-gradient-to-r from-[#1D976C] to-[#093123] rounded" style="width: {{ $normalizedValue * 100 }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-400 mt-10">Pilih produk dari sidebar untuk melihat detail.</p>
            @endif
        </div>
    </div>
</div>
