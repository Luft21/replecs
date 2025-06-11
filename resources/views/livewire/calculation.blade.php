<div class="w-full h-full overflow-y-auto p-8 text-sm text-white scrollbar-hidden" style="font-family: 'Outfit', sans-serif;">
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
    <div class="flex justify-end mb-4 gap-4">
        <a href="/spk/sessions" class="bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-2 px-4 rounded transition-colors duration-200 mr-auto flex items-center">
            ← Kembali
        </a>
    </div>

    <!-- Matriks Keputusan -->
    <h2 class="text-lg font-bold mb-2">Matriks Keputusan (f)</h2>
    <table class="table-auto border border-black w-full mb-4">
        <thead class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
            <tr>
                <th class="border p-1">Tipe</th>
                @foreach ($kriterias as $kriteria)
                    <th class="border p-1">{{ $kriteria->nama }}</th>
                @endforeach
            </tr>
            <tr class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
                <td class="border p-1">Bobot</td>
                @foreach ($weights as $weight)
                    <td class="border p-1">{{ $weight }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($matriksKeputusan as $namaLaptop => $nilai)
                <tr>
                    <td class="border p-1">{{ $namaLaptop }}</td>
                    @foreach ($nilai as $v)
                        <td class="border p-1">{{ $v }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Maksimum & Minimum -->
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <h3 class="font-semibold">Maksimum</h3>
            <table class="table-auto border border-black w-full">
                <tr>
                    @foreach ($maksimum as $val)
                        <td class="border p-1">{{ $val }}</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <div>
            <h3 class="font-semibold">Minimum</h3>
            <table class="table-auto border border-black w-full">
                <tr>
                    @foreach ($minimum as $val)
                        <td class="border p-1">{{ $val }}</td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>

    <!-- Matriks Normalisasi -->
    <h2 class="text-lg font-bold mb-2">Matriks Normalisasi (N)</h2>
    <table class="table-auto border border-black w-full mb-4">
        <thead class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
            <tr>
                <th class="border p-1">Alternatif</th>
                @foreach ($kriterias as $kriteria)
                    <th class="border p-1">{{ $kriteria->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($matriksNormalisasi as $namaLaptop => $nilai)
                <tr>
                    <td class="border p-1">{{ $namaLaptop }}</td>
                    @foreach ($nilai as $v)
                        <td class="border p-1">{{ round($v, 6) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Matriks Normalisasi Terbobot -->
    <h2 class="text-lg font-bold mb-2">Matriks Normalisasi Terbobot (F* / Fa)</h2>
    <table class="table-auto border border-black w-full mb-4">
        <thead class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
            <tr>
                <th class="border p-1">Alternatif</th>
                @foreach ($kriterias as $kriteria)
                    <th class="border p-1">{{ $kriteria->nama }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($matriksTerbobot as $namaLaptop => $nilai)
                <tr>
                    <td class="border p-1">{{ $namaLaptop }}</td>
                    @foreach ($nilai as $v)
                        <td class="border p-1">{{ round($v, 6) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Si & Ri Table -->
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
            <h3 class="font-semibold mb-2">Nilai Si</h3>
            <table class="table-auto border border-black w-full">
                @foreach ($nilaiSi as $namaLaptop => $val)
                    <tr>
                        <td class="border p-1">{{ $namaLaptop }}</td>
                        <td class="border p-1">{{ round($val, 6) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>
            <h3 class="font-semibold mb-2">Nilai Ri</h3>
            <table class="table-auto border border-black w-full">
                @foreach ($nilaiRi as $namaLaptop => $val)
                    <tr>
                        <td class="border p-1">{{ $namaLaptop }}</td>
                        <td class="border p-1">{{ round($val, 6) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Final Result -->
    <h2 class="text-lg font-bold mb-2">Nilai Akhir</h2>
    <table class="table-auto border border-black w-full mb-6">
        <thead class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
            <tr>
                <th class="border p-1">Alternatif</th>
                <th class="border p-1">Nilai Akhir (Q)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasil as $item)
                <tr>
                    <td class="border p-1">{{ $item['nama'] ?? '-' }}</td>
                    <td class="border p-1">{{ round($item['nilai_Q'], 6) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div
    class="border border-dashed p-3 text-center rounded"
    style="
        border-width: 1px;
        border-image: linear-gradient(to right, #1D976C, #093123) 1;
        border-image-slice: 1;
    "
    >
    <strong class="bg-gradient-to-r from-[#1D976C] to-[#093123] bg-clip-text text-transparent font-bold">
        Alternatif Ranking Tertinggi:
    </strong>
    {{ $hasil[0]['nama'] ?? '-' }}
    </div>
</div>
