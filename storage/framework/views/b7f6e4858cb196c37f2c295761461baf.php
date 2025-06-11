<!--[if BLOCK]><![endif]--><?php if($paginator->hasPages()): ?>
    <nav role="navigation" aria-label="<?php echo e(__('Pagination Navigation')); ?>" class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px gap-1">
            
            <!--[if BLOCK]><![endif]--><?php if($paginator->onFirstPage()): ?>
                <li>
                    <span class="px-4 py-2 rounded-l-lg bg-[#1e1e1e] text-white cursor-default select-none">‹</span>
                </li>
            <?php else: ?>
                <li>
                    <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="px-4 py-2 rounded-l-lg bg-[#1e1e1e] text-white hover:bg-[#232323]">‹</a>
                </li>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <!--[if BLOCK]><![endif]--><?php if(is_string($element)): ?>
                    <li>
                        <span class="px-4 py-2 bg-[#1e1e1e] text-white select-none"><?php echo e($element); ?></span>
                    </li>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                
                <!--[if BLOCK]><![endif]--><?php if(is_array($element)): ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!--[if BLOCK]><![endif]--><?php if($page == $paginator->currentPage()): ?>
                            <li>
                                <span class="px-4 py-2 bg-[#1e1e1e] text-white font-bold rounded"><?php echo e($page); ?></span>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e($url); ?>" class="px-4 py-2 bg-[#1e1e1e] text-white hover:bg-[#232323] rounded"><?php echo e($page); ?></a>
                            </li>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            
            <!--[if BLOCK]><![endif]--><?php if($paginator->hasMorePages()): ?>
                <li>
                    <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" class="px-4 py-2 rounded-r-lg bg-[#1e1e1e] text-white hover:bg-[#232323]">›</a>
                </li>
            <?php else: ?>
                <li>
                    <span class="px-4 py-2 rounded-r-lg bg-[#1e1e1e] text-white cursor-default select-none">›</span>
                </li>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </ul>
    </nav>
<?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>