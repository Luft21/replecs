@extends('layouts.app')

@section('content')
{{-- Main Content --}}
<div class="ml-48 flex-1 p-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
    {{-- Text Content --}}
    <div>
        <p class="mb-4 text-lg font-semibold">🎮 Bingung Pilih Laptop Gaming? Kami Bantu Temukan yang Terbaik.</p>
        <p class="mb-6 leading-relaxed text-sm md:text-base">
            Gunakan aplikasi cerdas berbasis Sistem Pendukung Keputusan (SPK) untuk menemukan laptop gaming
            yang paling sesuai dengan kebutuhan performa, budget, dan gaya bermainmu. Pilih sendiri
            prioritasmu, dan biarkan sistem bekerja memberi rekomendasi paling akurat.
        </p>
        <a href="#"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
            Mulai Sekarang
        </a>
    </div>

    {{-- Image Section --}}
    <div class="flex flex-col items-center">
        <div class="p-2 bg-green-600 rounded-tr-3xl rounded-bl-3xl">
            <img src="{{ asset('images/rog-flow.jpg') }}" alt="ROG Flow Z13" class="rounded-lg max-w-full">
        </div>
        <h5 class="mt-3 text-sm text-white">ROG Flow Z13</h5>
    </div>
</div>
@endsection
