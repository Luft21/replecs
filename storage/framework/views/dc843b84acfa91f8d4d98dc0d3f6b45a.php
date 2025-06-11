<div class="w-full h-full overflow-y-auto p-8 text-sm text-white scrollbar-hidden" style="font-family: 'Poppins', sans-serif;" >
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
    <div class="flex justify-end mb-4 gap-4">
        <a href="/spk/sessions" class="bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold py-2 px-4 rounded transition-colors duration-200 mr-auto flex items-center">
            ← Kembali
        </a>
    </div>

    <!-- Matriks Keputusan -->
    <h2 class="text-lg font-bold mb-2">Matriks Keputusan (f)</h2>
    <table class="table-auto border border-black w-full mb-4">
        <thead class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
            <tr>
                <th class="border p-1">Tipe</th>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th class="border p-1"><?php echo e($kriteria->nama); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tr>
            <tr class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
                <td class="border p-1">Bobot</td>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $weights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td class="border p-1"><?php echo e($weight); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $matriksKeputusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namaLaptop => $nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border p-1"><?php echo e($namaLaptop); ?></td>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $nilai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="border p-1"><?php echo e($v); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>

    <!-- Maksimum & Minimum -->
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <h3 class="font-semibold">Maksimum</h3>
            <table class="table-auto border border-black w-full">
                <tr>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $maksimum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="border p-1"><?php echo e($val); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tr>
            </table>
        </div>
        <div>
            <h3 class="font-semibold">Minimum</h3>
            <table class="table-auto border border-black w-full">
                <tr>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $minimum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="border p-1"><?php echo e($val); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tr>
            </table>
        </div>
    </div>

    <!-- Matriks Normalisasi -->
    <h2 class="text-lg font-bold mb-2">Matriks Normalisasi (N)</h2>
    <table class="table-auto border border-black w-full mb-4">
        <thead class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
            <tr>
                <th class="border p-1">Alternatif</th>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th class="border p-1"><?php echo e($kriteria->nama); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $matriksNormalisasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namaLaptop => $nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border p-1"><?php echo e($namaLaptop); ?></td>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $nilai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="border p-1"><?php echo e(round($v, 6)); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>

    <!-- Matriks Normalisasi Terbobot -->
    <h2 class="text-lg font-bold mb-2">Matriks Normalisasi Terbobot (F* / Fa)</h2>
    <table class="table-auto border border-black w-full mb-4">
        <thead class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
            <tr>
                <th class="border p-1">Alternatif</th>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th class="border p-1"><?php echo e($kriteria->nama); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $matriksTerbobot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namaLaptop => $nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border p-1"><?php echo e($namaLaptop); ?></td>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $nilai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="border p-1"><?php echo e(round($v, 6)); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>

    <!-- Si & Ri Table -->
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
            <h3 class="font-semibold mb-2">Nilai Si</h3>
            <table class="table-auto border border-black w-full">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $nilaiSi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namaLaptop => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border p-1"><?php echo e($namaLaptop); ?></td>
                        <td class="border p-1"><?php echo e(round($val, 6)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </table>
        </div>
        <div>
            <h3 class="font-semibold mb-2">Nilai Ri</h3>
            <table class="table-auto border border-black w-full">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $nilaiRi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namaLaptop => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border p-1"><?php echo e($namaLaptop); ?></td>
                        <td class="border p-1"><?php echo e(round($val, 6)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </table>
        </div>
    </div>

    <!-- Final Result -->
    <h2 class="text-lg font-bold mb-2">Nilai Akhir</h2>
    <table class="table-auto border border-black w-full mb-6">
        <thead class="bg-gradient-to-r from-[#1D976C] to-[#093123]">
            <tr>
                <th class="border p-1">Alternatif</th>
                <th class="border p-1">Nilai Akhir (Q)</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $hasil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="border p-1"><?php echo e($item['nama'] ?? '-'); ?></td>
                    <td class="border p-1"><?php echo e(round($item['nilai_Q'], 6)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>

    <div
    class="border border-dashed p-3 text-center rounded"
    style="
        border-width: 1px;
        border-image: linear-gradient(to right, #1D976C, #093123) 1;
        border-image-slice: 1;
    "
    >
    <strong class="bg-gradient-to-r from-[#1D976C] to-[#093123] bg-clip-text text-transparent font-bold">
        Alternatif Ranking Tertinggi:
    </strong>
    <?php echo e($hasil[0]['nama'] ?? '-'); ?>

    </div>
</div>
<?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/livewire/calculation.blade.php ENDPATH**/ ?>