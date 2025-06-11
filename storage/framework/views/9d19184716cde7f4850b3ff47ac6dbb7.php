
<div class="p-8 text grid grid-cols-1 md:grid-cols-2 gap-8 items-center justify-center">
    
    <div>
        <p class="mb-4 text-xl font-semibold">🎮 Bingung Pilih Laptop Gaming? Kami Bantu Temukan yang Terbaik.</p>
        <p class="mb-6 leading-relaxed text-sm md:text-base">
            Gunakan aplikasi cerdas berbasis Sistem Pendukung Keputusan (SPK) untuk menemukan laptop gaming
            yang paling sesuai dengan kebutuhan performa, budget, dan gaya bermainmu. Pilih sendiri
            prioritasmu, dan biarkan sistem bekerja memberi rekomendasi paling akurat.
        </p>
        <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(url('/spk/sessions')); ?>"
                class="bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-2 px-4 rounded-lg">
                Mulai Sekarang
            </a>
        <?php else: ?>
            <a href="<?php echo e(url('/auth')); ?>"
                class="bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-2 px-4 rounded-lg">
                Mulai Sekarang
            </a>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    
    <div 
    x-data="{
        active: 0,
        images: [
            <?php $__currentLoopData = $laptopImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nama => $gambar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                { src: '<?php echo e(asset('storage/alternatif-images/' . $gambar)); ?>', label: '<?php echo e($nama); ?>' },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ],
        init() {
            setInterval(() => {
                this.next();
            }, 5000); // Ganti setiap 5 detik
        },
        prev() {
            this.active = (this.active === 0) ? this.images.length - 1 : this.active - 1;
        },
        next() {
            this.active = (this.active === this.images.length - 1) ? 0 : this.active + 1;
        }
    }"
    x-init="init()"
    class="flex flex-col items-center max-w-md mx-auto"
>
    <div class="relative w-120 p-2 rounded-tr-3xl rounded-bl-3xl h-90 overflow-hidden">
        <template x-for="(image, index) in images" :key="index">
            <img
                :src="image.src"
                :alt="image.label"
                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out rounded-lg"
                :class="{ 'opacity-100': active === index, 'opacity-0': active !== index }"
            />
        </template>
    </div>
    <div class="relative h-10 mt-3">
        <template x-for="(image, index) in images" :key="'label-' + index">
            <h5
                class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center font-semibold text-white text-xl transition-opacity duration-1000 ease-in-out whitespace-nowrap"
                :class="{ 'opacity-100': active === index, 'opacity-0': active !== index }"
            >
                <span x-text="image.label"></span>
            </h5>
        </template>
    </div>
</div><?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/livewire/home-page.blade.php ENDPATH**/ ?>