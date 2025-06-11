<div class="flex justify-center items-center min-h-screen bg-[#121212] px-4 font-sans text-white">
    <div class="bg-[#1e1e1e] w-full max-w-md p-10 rounded-xl shadow-xl text-center">
        <h2 class="text-2xl font-light text-center mb-6">
            <?php echo e($isRegisterMode ? 'Buat Akun Baru' : 'Login ke Akun Anda'); ?>

        </h2>

        <!--[if BLOCK]><![endif]--><?php if(session('status')): ?>
            <div class="bg-gradient-to-r from-[#1D976C] to-[#093123] text-white text-sm py-2 px-4 rounded mb-6">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <form wire:submit.prevent="submit" class="text-left">
            <!--[if BLOCK]><![endif]--><?php if($isRegisterMode): ?>
                <div class="mb-5">
                    <label for="name" class="block text-sm mb-2 text-[#b2becd]">Nama Lengkap</label>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model.lazy="name"
                        placeholder="Masukkan nama lengkap Anda"
                        class="w-full px-4 py-3 rounded-md bg-[#121212] border border-[#2c3e50] text-white focus:outline-none focus:ring-2 focus:ring-[#1D976C]"
                    >
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-400 text-sm mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <div class="mb-5">
                <label for="email" class="block text-sm mb-2 text-[#b2becd]">Alamat Email</label>
                <input 
                    type="email" 
                    id="email" 
                    wire:model.lazy="email"
                    placeholder="contoh@email.com"
                    class="w-full px-4 py-3 rounded-md bg-[#121212] border border-[#2c3e50] text-white focus:outline-none focus:ring-2 focus:ring-[#1D976C]"
                >
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-400 text-sm mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
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
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-400 text-sm mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <!--[if BLOCK]><![endif]--><?php if(!$isRegisterMode): ?>
                <div class="mb-5 flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        wire:model="remember"
                        class="rounded border-[#2c3e50] bg-[#121212] text-[#1D976C] focus:ring-[#1D976C] mr-2"
                    >
                    <label for="remember" class="text-sm text-[#b2becd] select-none cursor-pointer">Ingat saya</label>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <!--[if BLOCK]><![endif]--><?php if($isRegisterMode): ?>
                <div class="mb-5">
                    <label for="password_confirmation" class="block text-sm mb-2 text-[#b2becd]">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        wire:model.lazy="password_confirmation"
                        placeholder="Ulangi password Anda"
                        class="w-full px-4 py-3 rounded-md bg-[#121212] border border-[#2c3e50] text-white focus:outline-none focus:ring-2 focus:ring-[#1D976C]"
                    >
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-400 text-sm mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <button 
                type="submit" 
                class="w-full py-3 mt-3 rounded-md bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold shadow transition duration-300"
            >
                <span wire:loading.remove wire:target="submit">
                    <?php echo e($isRegisterMode ? 'Daftar Sekarang' : 'Login'); ?>

                </span>
                <span wire:loading wire:target="submit">
                    Memproses...
                </span>
            </button>
        </form>

        <div class="mt-8 text-center">
            <!--[if BLOCK]><![endif]--><?php if($isRegisterMode): ?>
                <span class="text-[#b2becd]">Sudah punya akun?</span>
                <button wire:click="switchToLogin" class="ml-1 text-[#1D976C] hover:underline font-semibold">Login</button>
            <?php else: ?>
                <span class="text-[#b2becd]">Belum punya akun?</span>
                <button wire:click="switchToRegister" class="ml-1 text-[#1D976C] hover:underline font-semibold">Register</button>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div><?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/livewire/auth-page.blade.php ENDPATH**/ ?>