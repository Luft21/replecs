{{-- About Page --}}
<div class="text-white flex items-center justify-center relative px-6 py-12">

    {{-- Konten utama --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center max-w-6xl mx-auto">
        
        {{-- Teks --}}
        <div>
            <h1 class="text-3xl font-bold mb-4">About</h1>
            <p class="text-sm leading-relaxed text-gray-300">
                Replecs adalah aplikasi cerdas berbasis Sistem Pendukung Keputusan (SPK) dalam menemukan laptop gaming yang paling sesuai untuk pengguna berdasarkan performa, daya tahan, budget, dan lainnya.<br><br>
                Aplikasi ini dikembangkan oleh Kelompok 8 yang beranggotakan Jose, Ady, dan Angel.
            </p>
        </div>

        {{-- Kartu anggota dengan carousel --}}
        <div 
            x-data="{
                activeIndex: 0,
                direction: 'right',
                members: [
                    { name: 'Jose Febrian Limbor', image: '{{ asset('images/jose.png') }}' },
                    { name: 'Ahmad Mukhlash Muhtady', image: '{{ asset('images/ady.png') }}' },
                    { name: 'Virginia Angel Alexandra Soen', image: '{{ asset('images/angel.png') }}' }
                ],
                prev() {
                    this.direction = 'left';
                    this.activeIndex = (this.activeIndex === 0) ? this.members.length - 1 : this.activeIndex - 1;
                },
                next() {
                    this.direction = 'right';
                    this.activeIndex = (this.activeIndex === this.members.length - 1) ? 0 : this.activeIndex + 1;
                }
            }"
            class="relative w-60 h-[360px] mx-auto text-center"
        >

            {{-- Tombol kiri --}}
            <button @click="prev" class="absolute left-[-2rem] top-1/2 transform -translate-y-1/2 text-[#39ff88] text-2xl font-bold z-10 hover:scale-125 duration-300">
                ‹
            </button>

            {{-- Tombol kanan --}}
            <button @click="next" class="absolute right-[-2rem] top-1/2 transform -translate-y-1/2 text-[#39ff88] text-2xl font-bold z-10 hover:scale-125 duration-300">
                ›
            </button>

            {{-- Card animasi --}}
            <div class="overflow-hidden h-full rounded-2xl relative">
                <template x-for="(member, index) in members" :key="index">
                    <div 
                        x-show="activeIndex === index" 
                        x-transition:enter="transition transform duration-500"
                        x-transition:enter-start="opacity-0 translate-x-full"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition transform duration-500"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-full"
                        class="absolute inset-0 bg-gradient-to-br from-[#39ff88] to-[#1E1E1E] p-4 rounded-2xl shadow-lg"
                    >
                        <img :src="member.image" :alt="member.name" class="rounded-2xl mb-3 w-full h-[280px] object-cover" />
                        <p class="font-semibold text-white" x-text="member.name"></p>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
