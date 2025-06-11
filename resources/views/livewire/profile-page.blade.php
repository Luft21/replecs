<div class="flex items-center justify-center min-h-[600px] h-full">
    <div class="bg-[#1e1e1e] rounded-2xl p-12 shadow-2xl w-full max-w-6xl">
        <div class="flex justify-between items-center gap-35">
            
            {{-- Kiri: Gabungan Foto Profil & Informasi Pengguna --}}
            <div class="flex flex-col items-center text-center">
                
                {{-- Foto Profil --}}
                <div class="flex-shrink-0 mb-4 ml-30">
                    <div class="w-30 h-30 rounded-full border-3 border-green-400 overflow-hidden bg-gradient-to-br from-purple-400 via-pink-300 to-blue-400">
                        <img src="{{ asset('images/pp.png') }}" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>
                </div>

                {{-- Informasi Pengguna --}}
            <div class="w-full max-w-sm space-y-6 text-[#93F9B9] text-left">
                <div>
                    <p class="text-sm">Username</p>
                    <p class="text-white text-xl font-medium">{{ auth()->user()->name ?? 'Carlotta Montelli' }}</p>
                </div>
                <div>
                    <p class="text-sm">Email</p>
                    <p class="text-white text-xl">{{ auth()->user()->email ?? 'akumontelli@gmail.com' }}</p>
                </div>
                <div>
                    <p class="text-sm">Password</p>
                    <p class="text-white text-xl">*******</p>
                </div>
            </div>
        </div>

            {{-- Garis Tengah--}}
            <div class="w-px bg-[#93F9B9] self-stretch"></div>

            {{-- Kanan: Tombol Aksi --}}
            <div class="flex flex-col pr-[90px] gap-5">
                <a href="{{ url('/user/editprofile') }}" class="bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-4 px-12 rounded-xl shadow-lg text-center text-lg transition-all duration-300 transform hover:scale-105 min-w-[200px]">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</div>