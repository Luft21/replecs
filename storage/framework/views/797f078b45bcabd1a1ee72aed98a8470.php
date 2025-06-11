<div class="flex items-center justify-center min-h-[600px] h-full">
    <div class="bg-[#1e1e1e] rounded-2xl p-12 shadow-2xl w-full max-w-6xl">
        <div class="flex justify-between items-center gap-35">
            
            
            <div class="flex flex-col items-center text-center">
                
                
                <div class="flex-shrink-0 mb-4 ml-30">
                    <div class="w-30 h-30 rounded-full border-3 border-green-400 overflow-hidden bg-gradient-to-br from-purple-400 via-pink-300 to-blue-400">
                        <img src="<?php echo e(asset('images/pp.png')); ?>" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>
                </div>

                
                <div class="space-y-6 text-left">
                    <div>
                        <p class="text-[#93F9B9] text-sm mb-1">Name</p>
                        <p class="text-white text-xl font-medium"><?php echo e(auth()->user()->name ?? 'Carlotta Montelli'); ?></p>
                    </div>

                    <div>
                        <p class="text-[#93F9B9] text-sm mb-1">Email</p>
                        <p class="text-white text-xl"><?php echo e(auth()->user()->email ?? 'akumontelli@gmail.com'); ?></p>
                    </div>

                    <div>
                        <p class="text-[#93F9B9] text-sm mb-1">Password</p>
                        <p class="text-white text-xl">*******</p>
                    </div>
                </div>
            </div>

            
            <div class="w-px bg-[#93F9B9] self-stretch"></div>

            
            <div class="flex flex-col gap-5">
                <a href="#" class="bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-4 px-12 rounded-xl shadow-lg text-center text-lg transition-all duration-300 transform hover:scale-105 min-w-[200px]">
                    Edit Profile
                </a>
                <a href="#" class="bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-4 px-12 rounded-xl shadow-lg text-center text-lg transition-all duration-300 transform hover:scale-105 min-w-[200px]">
                    History
                </a>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/livewire/profile-page.blade.php ENDPATH**/ ?>