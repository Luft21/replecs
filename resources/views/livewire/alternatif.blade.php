<div class="mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($laptops as $laptop)
            <div class="bg-[#1e1e1e] rounded-xl shadow-lg p-6 flex flex-col items-center">
                <div class="w-48 h-32 mb-4 rounded-lg bg-[#232323] border border-[#2c3e50] flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('storage/' . ($laptop->gambar ?? 'default.png')) }}"
                         alt="{{ $laptop->nama }}"
                         class="object-contain w-full h-full" />
                </div>
                <div class="text-xl text-white mb-2 text-center">{{ $laptop->nama }}</div>
                <div class="w-full">
                    @foreach($kriterias as $kriteria)
                        @php
                            $nilai = $nilaiKriteria[$laptop->id]->firstWhere('id_kriteria', $kriteria->id)->nilai ?? 0;
                        @endphp
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-gray-300">{{ $kriteria->nama }}</span>
                            <span>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $nilai)
                                        <svg class="inline w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,6.99 19,7.64 14,12.26 15.18,18.51 10,15.27 4.82,18.51 6,12.26 1,7.64 7.41,6.99"/></svg>
                                    @else
                                        <svg class="inline w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,6.99 19,7.64 14,12.26 15.18,18.51 10,15.27 4.82,18.51 6,12.26 1,7.64 7.41,6.99"/></svg>
                                    @endif
                                @endfor
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center mt-8">
        {{ $laptops->links() }}
    </div>
</div>