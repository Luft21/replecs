<div class="container mx-auto pt-8" style="font-family: 'Outfit', sans-serif;">
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-3xl font-bold leading-tight text-gray-100">
                History Sesi SPK
            </h2>
            <p class="text-sm text-gray-400 mt-1">
                Berikut adalah daftar sesi SPK yang telah tercatat.
            </p>
        </div>
        @if ($sesiSpks->count() > 0)
            <a href="{{ route('spk.kuesioner') }}"
                class="mt-4 md:mt-0 inline-block bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-2 px-4 rounded-lg shadow transition-all duration-300 transform hover:scale-105">
                + Tambah Sesi Baru
            </a>
        @endif
    </div>
    
    <div class="bg-[#1e1e1e] shadow-lg rounded-lg overflow-hidden border border-neutral-700">
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
<thead>
    <tr class="bg-[#242424] text-left text-gray-300 uppercase text-sm font-semibold">
        <th class="px-6 py-4 border-b-2 border-neutral-700">No.</th>
        <th class="px-6 py-4 border-b-2 border-neutral-700">Tanggal Dibuat</th>
        <th class="px-6 py-4 border-b-2 border-neutral-700">Laptop Rekomendasi</th>
        <th class="px-6 py-4 border-b-2 border-neutral-700 text-center">Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse ($sesiSpks as $index => $sesi)
    @php
        $hasilUtama = \App\Models\HasilSpk::where('id_sesi', $sesi->id)
            ->orderBy('nilai_Q')
            ->with('laptop')
            ->first();
    @endphp
        <tr class="hover:bg-[#2a2a2a] border-b border-neutral-700">
            <td class="px-6 py-4 text-sm text-gray-400">
                {{ $sesiSpks->firstItem() + $index }}
            </td>
            <td class="px-6 py-4 text-sm text-gray-300">
                {{ $sesi->created_at->translatedFormat('d F Y, H:i') }} <span class="text-gray-500">WIB</span>
            </td>
            <td class="px-6 py-4 text-sm">
                @if($hasilUtama && $hasilUtama->laptop)
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('storage/' . $hasilUtama->laptop->gambar) }}"
                             alt="{{ $hasilUtama->laptop->nama }}"
                             class="w-16 h-16 object-cover rounded border border-[#1D976C] bg-[#232323]">
                        <div>
                            <div class="font-semibold text-white">{{ $hasilUtama->laptop->nama }}</div>
                            <div class="text-xs text-gray-400">{{ $hasilUtama->laptop->merek ?? '' }}</div>
                        </div>
                    </div>
                @else
                    <span class="text-gray-500 italic">-</span>
                @endif
            </td>
            <td class="px-6 py-4 text-sm text-center">
                <a href="{{ route('spk.result', ['spk-session' => $sesi->id]) }}"
                    class="font-medium text-[#1D976C] hover:text-[#27c08c] block mb-1">
                    Lihat Detail
                </a>
                <a href="{{ route('spk.calculation', ['spk-session' => $sesi->id]) }}"
                    class="font-medium text-[#1D976C] hover:text-[#27c08c] block">
                    Lihat Perhitungan
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-6 py-10 border-b border-neutral-700 text-center">
                <p class="text-gray-400 text-lg">Tidak ada data sesi SPK yang ditemukan.</p>
                <a href="{{ route('spk.kuesioner') }}" class="mt-4 inline-block bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-2 px-4 rounded-lg">
                    Buat Sesi Baru
                </a> 
            </td>
        </tr>
    @endforelse
</tbody>
            </table>
        </div>
        
        @if ($sesiSpks->hasPages())
        <div class="px-6 py-4 bg-[#1e1e1e] border-t border-neutral-700 flex flex-col xs:flex-row items-center xs:justify-between">
            <span class="text-xs xs:text-sm text-gray-400">
                Menampilkan {{ $sesiSpks->firstItem() }} sampai {{ $sesiSpks->lastItem() }} dari {{ $sesiSpks->total() }} data
            </span>
            <div class="mt-2 sm:mt-0">
                {{ $sesiSpks->links() }}
            </div>
        </div>
        @endif
    </div>
</div>