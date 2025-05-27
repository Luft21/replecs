<div class="flex justify-center items-center min-h-screen bg-[#121212] px-4 font-sans text-white">
    <div class="bg-[#1e1e1e] w-full max-w-md p-10 rounded-xl shadow-xl text-center">
        <h2 class="text-2xl font-light text-center mb-6">
            {{ $isRegisterMode ? 'Buat Akun Baru' : 'Login ke Akun Anda' }}
        </h2>

        @if (session('status'))
            <div class="bg-gradient-to-r from-[#1D976C] to-[#093123] text-white text-sm py-2 px-4 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form wire:submit.prevent="submit" class="text-left">
            @if ($isRegisterMode)
                <div class="mb-5">
                    <label for="name" class="block text-sm mb-2 text-[#b2becd]">Nama Lengkap</label>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model.lazy="name"
                        placeholder="Masukkan nama lengkap Anda"
                        class="w-full px-4 py-3 rounded-md bg-[#121212] border border-[#2c3e50] text-white focus:outline-none focus:ring-2 focus:ring-[#1D976C]"
                    >
                    @error('name') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            @endif

            <div class="mb-5">
                <label for="email" class="block text-sm mb-2 text-[#b2becd]">Alamat Email</label>
                <input 
                    type="email" 
                    id="email" 
                    wire:model.lazy="email"
                    placeholder="contoh@email.com"
                    class="w-full px-4 py-3 rounded-md bg-[#121212] border border-[#2c3e50] text-white focus:outline-none focus:ring-2 focus:ring-[#1D976C]"
                >
                @error('email') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block text-sm mb-2 text-[#b2becd]">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    wire:model.lazy="password"
                    placeholder="Masukkan password"
                    class="w-full px-4 py-3 rounded-md bg-[#121212] border border-[#2c3e50] text-white focus:outline-none focus:ring-2 focus:ring-[#1D976C]"
                >
                @error('password') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            @if (!$isRegisterMode)
                <div class="mb-5 flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        wire:model="remember"
                        class="rounded border-[#2c3e50] bg-[#121212] text-[#1D976C] focus:ring-[#1D976C] mr-2"
                    >
                    <label for="remember" class="text-sm text-[#b2becd] select-none cursor-pointer">Ingat saya</label>
                </div>
            @endif

            @if ($isRegisterMode)
                <div class="mb-5">
                    <label for="password_confirmation" class="block text-sm mb-2 text-[#b2becd]">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        wire:model.lazy="password_confirmation"
                        placeholder="Ulangi password Anda"
                        class="w-full px-4 py-3 rounded-md bg-[#121212] border border-[#2c3e50] text-white focus:outline-none focus:ring-2 focus:ring-[#1D976C]"
                    >
                    @error('password_confirmation') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            @endif

            <button 
                type="submit" 
                class="w-full py-3 mt-3 rounded-md bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold shadow transition duration-300"
            >
                <span wire:loading.remove wire:target="submit">
                    {{ $isRegisterMode ? 'Daftar Sekarang' : 'Login' }}
                </span>
                <span wire:loading wire:target="submit">
                    Memproses...
                </span>
            </button>
        </form>

        <div class="mt-8 text-center">
            @if($isRegisterMode)
                <span class="text-[#b2becd]">Sudah punya akun?</span>
                <button wire:click="switchToLogin" class="ml-1 text-[#1D976C] hover:underline font-semibold">Login</button>
            @else
                <span class="text-[#b2becd]">Belum punya akun?</span>
                <button wire:click="switchToRegister" class="ml-1 text-[#1D976C] hover:underline font-semibold">Register</button>
            @endif
        </div>
    </div>
</div>