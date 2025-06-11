<div class="text-white flex items-center justify-center relative" style="font-family: 'Outfit', sans-serif;">

    {{-- Konten utama --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center max-w-6xl mx-auto">
        
        {{-- Teks --}}
        <div class="-mt-[150px]">
            <h1 class="text-4xl font-bold mb-8">About</h1>
            <p class="text-m text-justify leading-relaxed text-gray-300">
                Replecs adalah aplikasi cerdas berbasis Sistem Pendukung Keputusan (SPK) dalam menemukan laptop gaming yang paling sesuai untuk pengguna berdasarkan performa, daya tahan, budget, dan lainnya.<br><br>
                Aplikasi ini dikembangkan oleh Kelompok 8 yang beranggotakan Jose, Ady, dan Angel.
            </p>
        </div>

        {{-- Kartu anggota dengan carousel --}}
        <div 
            x-data="{
                activeIndex: 0,
                prevIndex: null,
                direction: 'right',  // track direction: 'right' or 'left'
                members: [
                    { name: 'Jose Febrian Limbor', image: '{{ asset('images/vergil.jpg') }}' },
                    { name: 'Ahmad Mukhlash Muhtady', image: '{{ asset('images/dante.jpg') }}' },
                    { name: 'Virginia Angel Alexandra Soen', image: '{{ asset('images/lady.jpg') }}' }
                ],
                prev() {
                    this.direction = 'left';
                    this.prevIndex = this.activeIndex;
                    this.activeIndex = (this.activeIndex === 0) ? this.members.length - 1 : this.activeIndex - 1;
                },
                next() {
                    this.direction = 'right';
                    this.prevIndex = this.activeIndex;
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
            <div class="overflow-hidden h-[400px] rounded-2xl relative">
            <div
                class="flex transition-transform duration-500 ease-in-out"
                :style="`transform: translateX(-${activeIndex * 100}%)`"
                style="width: calc(100% * 3);" 
            >
                <template x-for="(member, index) in members" :key="index">
                    <div 
                        class="w-full flex-shrink-0 p-4 rounded-2xl shadow-lg flex flex-col items-center will-change-transform"
                    >
                        <!-- Styled layered image card -->
                        <div class="relative w-full h-[360px] rounded-2xl overflow-visible shadow-md mb-3">
                            <!-- Background card (offset slightly) -->
                            <div class="absolute bottom-4 right-4 w-full h-full rounded-3xl bg-gradient-to-r from-[#1D976C] to-[#093123] z-0"></div>

                            <!-- Foreground image card -->
                            <div class="relative z-10 w-full h-full overflow-hidden rounded-2xl">
                                <img 
                                    :src="member.image" 
                                    :alt="member.name" 
                                    class="w-full h-full object-cover rounded-2xl"
                                />

                                <!-- Overlay text -->
                                <div class="absolute bottom-0 w-full bg-black bg-opacity-50 text-white py-2 bg-transparent text-sm font-semibold text-center rounded-b-2xl">
                                    <p x-text="member.name"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        </div>
    </div>
</div>
