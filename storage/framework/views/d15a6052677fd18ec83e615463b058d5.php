<div class="mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $laptops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laptop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-[#1e1e1e] rounded-xl shadow-lg p-6 flex flex-col items-center">
                <div class="w-48 h-32 mb-4 rounded-lg bg-[#232323] border border-[#2c3e50] flex items-center justify-center overflow-hidden">
                    <img src="<?php echo e(asset('storage/alternatif-images/' . ($laptop->gambar ?? 'default.png'))); ?>"
                         alt="<?php echo e($laptop->nama); ?>"
                         class="object-contain w-full h-full" />
                </div>
                <div class="text-xl font-semibold text-white mb-2 text-center"><?php echo e($laptop->nama); ?></div>
                <div class="w-full">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $nilai = $nilaiKriteria[$laptop->id]->firstWhere('id_kriteria', $kriteria->id)->nilai ?? 0;
                        ?>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-gray-300"><?php echo e($kriteria->nama); ?></span>
                            <span>
                                <!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= 5; $i++): ?>
                                    <!--[if BLOCK]><![endif]--><?php if($i <= $nilai): ?>
                                        <svg class="inline w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,6.99 19,7.64 14,12.26 15.18,18.51 10,15.27 4.82,18.51 6,12.26 1,7.64 7.41,6.99"/></svg>
                                    <?php else: ?>
                                        <svg class="inline w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><polygon points="10,1 12.59,6.99 19,7.64 14,12.26 15.18,18.51 10,15.27 4.82,18.51 6,12.26 1,7.64 7.41,6.99"/></svg>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                            </span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="flex justify-center mt-8">
        <?php echo e($laptops->links()); ?>

    </div>
</div><?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/livewire/alternatif.blade.php ENDPATH**/ ?>