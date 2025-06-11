<div>
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

    <div class="flex h-screen text-white">
        <!-- Sidebar -->
        <div id="sidebar" class="w-1/4 bg-[#1a1a1a] p-4 overflow-y-auto scrollbar-hidden relative">
            <div class="relative space-y-4 pr-4">
                <div class="absolute top-0 bottom-0 right-0 w-1 bg-[#1D976C] rounded-full opacity-75"></div>

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div wire:key="product-<?php echo e($index); ?>" wire:click="selectProduct(<?php echo e($index); ?>)" class="cursor-pointer relative z-10">
                        <img src="<?php echo e(asset('images/' . $product['image'])); ?>"
                            alt="<?php echo e($product['name']); ?>"
                            class="rounded-md border-2 transition-all duration-300 <?php echo e(isset($selectedProduct) && $selectedProduct['name'] === $product['name'] ? 'border-[#1D976C]' : 'border-transparent'); ?>">
                        <p class="text-center mt-1 font-semibold"><?php echo e($index + 1); ?>. <?php echo e($product['name']); ?></p>
                        <p class="text-center text-sm text-gray-400">Score: <?php echo e(number_format($product['Qi'], 4)); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <!-- Detail Section -->
        <div class="w-3/4 p-6 bg-[#121212] overflow-y-auto scrollbar-hidden">
            <!--[if BLOCK]><![endif]--><?php if(isset($selectedProduct)): ?>
                <img src="<?php echo e(asset('images/' . $selectedProduct['image'])); ?>" 
                    alt="<?php echo e($selectedProduct['name']); ?>" 
                    class="w-1/2 h-auto mx-auto mb-4 rounded shadow-lg">

                <h2 class="text-3xl font-bold text-gradient-to-r from-[#1D976C] to-[#093123]  text-center"><?php echo e($selectedProduct['name']); ?></h2>

                <div class="mt-2 text-center text-gray-400">
                    Final Score (Qi): <?php echo e(number_format($selectedProduct['Qi'], 4)); ?>

                </div>

                <div class="mt-6 space-y-4">
                   <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $selectedProduct['normalized']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $normalizedValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <p class="mb-1">Kriteria <?php echo e($index + 1); ?> (Asli: <?php echo e($selectedProduct['criteria'][$index]); ?>, Ternormalisasi: <?php echo e(number_format($normalizedValue, 2)); ?>)</p>
                            <div class="w-full h-3 bg-gradient-to-r from-[#1f1f1f] via-[#1f1f1f] to-gray-800 rounded">
                                <div class="h-3 bg-gradient-to-r from-[#1D976C] to-[#093123] rounded" style="width: <?php echo e($normalizedValue * 100); ?>%"></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php else: ?>
                <p class="text-center text-gray-400 mt-10">Pilih produk dari sidebar untuk melihat detail.</p>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/livewire/result-page.blade.php ENDPATH**/ ?>