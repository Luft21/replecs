<div class="flex items-center justify-center min-h-[600px] h-full">
    <div class="bg-[#1e1e1e] rounded-2xl p-12 shadow-2xl w-full max-w-6xl">
        <div class="flex justify-between items-center gap-35">

            <!-- KIRI: Foto dan Info -->
            <div class="flex flex-col items-center text-center">
                <!-- Foto Profil -->
                <div class="flex-shrink-0 mb-4 ml-30">
                    <div class="w-30 h-30 rounded-full border-3 border-green-400 overflow-hidden bg-gradient-to-br from-purple-400 via-pink-300 to-blue-400">
                        <img src="{{ asset('images/pp.png') }}" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Info Pengguna -->
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

            <!-- Garis Tengah -->
            <div class="w-px bg-[#93F9B9] self-stretch"></div>

            <!-- KANAN: Form Edit -->
            <div class="flex flex-col pr-[90px] gap-5 w-full max-w-md">
                @if (session()->has('success'))
                    <div class="bg-green-600 text-white px-4 py-2 rounded text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="updateProfile" class="space-y-6">
                    <div>
                        <label class="text-[#93F9B9] block mb-1" for="username">Username</label>
                        <input type="text" id="username" wire:model.defer="username"
                            class="w-full bg-transparent border-2 border-[#93F9B9] rounded-md p-2 text-white focus:outline-none" />
                        @error('username') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-[#93F9B9] block mb-1" for="email">Email</label>
                        <input type="email" id="email" wire:model.defer="email"
                            class="w-full bg-transparent border-2 border-[#93F9B9] rounded-md p-2 text-white focus:outline-none" />
                        @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-[#93F9B9] block mb-1" for="password">Password</label>
                        <input type="password" id="password" wire:model.defer="password"
                            placeholder="Leave blank if unchanged"
                            class="w-full bg-transparent border-2 border-[#93F9B9] rounded-md p-2 text-white focus:outline-none" />
                        @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex gap-4 mt-4 justify-center items-center">
                        <button type="submit"
                            class="bg-gradient-to-r from-[#1D976C] to-[#093123] text-white font-semibold py-2 px-6 rounded-md hover:scale-105 transition">
                            Save
                        </button>
                        <a href="{{ url('/user/profile') }}">
                        <button type="button"
                            class="bg-red-800 text-white font-semibold py-2 px-6 rounded-md hover:scale-105 transition"
                            wire:click="$refresh">
                            Cancel
                        </button>
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
