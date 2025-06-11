<div class="container mx-auto pt-8">
    <div class="mb-6">
        <h2 class="text-3xl font-bold leading-tight text-gray-100">
            History Sesi SPK
        </h2>
        <p class="text-sm text-gray-400 mt-1">
            Berikut adalah daftar sesi SPK yang telah tercatat.
        </p>
    </div>

    <div class="bg-[#1e1e1e] shadow-lg rounded-lg overflow-hidden border border-neutral-700">
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-[#242424] text-left text-gray-300 uppercase text-sm font-semibold">
                        <th class="px-6 py-4 border-b-2 border-neutral-700">No.</th>
                        <th class="px-6 py-4 border-b-2 border-neutral-700">Tanggal Dibuat</th>
                        <th class="px-6 py-4 border-b-2 border-neutral-700 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $sesiSpks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sesi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-[#2a2a2a] border-b border-neutral-700">
                            <td class="px-6 py-4 text-sm text-gray-400">
                                <?php echo e($sesiSpks->firstItem() + $index); ?>

                            </td>
                            <td class="px-6 py-4 text-sm text-gray-300">
                                <?php echo e($sesi->created_at->translatedFormat('d F Y, H:i')); ?> <span class="text-gray-500">WIB</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-center">
                                    <a href="<?php echo e(route('spk.result', ['spk-session' => $sesi->id])); ?>"
                                        class="font-medium text-[#1D976C] hover:text-[#27c08c] block mb-1">
                                        Lihat Detail
                                    </a>
                                    <a href="<?php echo e(route('spk.calculation', ['spk-session' => $sesi->id])); ?>"
                                        class="font-medium text-[#1D976C] hover:text-[#27c08c] block">
                                        Lihat Perhitungan
                                    </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-10 border-b border-neutral-700 text-center">
                                <p class="text-gray-400 text-lg">Tidak ada data sesi SPK yang ditemukan.</p>
                                <a href="<?php echo e(route('spk.kuesioner')); ?>" class="mt-4 inline-block bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-2 px-4 rounded-lg">
                                    Buat Sesi Baru
                                </a> 
                            </td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
        
        <!--[if BLOCK]><![endif]--><?php if($sesiSpks->hasPages()): ?>
        <div class="px-6 py-4 bg-[#1e1e1e] border-t border-neutral-700 flex flex-col xs:flex-row items-center xs:justify-between">
            <span class="text-xs xs:text-sm text-gray-400">
                Menampilkan <?php echo e($sesiSpks->firstItem()); ?> sampai <?php echo e($sesiSpks->lastItem()); ?> dari <?php echo e($sesiSpks->total()); ?> data
            </span>
            <div class="mt-2 sm:mt-0">
                <?php echo e($sesiSpks->links()); ?>

            </div>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div><?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/livewire/session-page.blade.php ENDPATH**/ ?>