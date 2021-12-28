<?php if($paginator->hasPages()): ?>
    <nav role="Page navigation" aria-label="<?php echo e(__('Pagination Navigation')); ?>" class="pagination flex items-center justify-between">
        <div class="md:hidden" >
            
            <?php if($paginator->onFirstPage()): ?>
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    <?php echo __('pagination.previous'); ?>

                </span>
            <?php else: ?>
                <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <?php echo __('pagination.previous'); ?>

                </a>
            <?php endif; ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <?php echo __('pagination.next'); ?>

                </a>
            <?php else: ?>
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    <?php echo __('pagination.next'); ?>

                </span>
            <?php endif; ?>
        </div>
        <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
            <div>
                <span class="flex items-center justify-center space-x-6 mb-4">
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(is_string($element)): ?>
                        <span aria-disabled="true">
                            <span class="dark:text-white cursor-default p-2 pr-4 pl-4 rounded-full font-bold"><?php echo e($element); ?></span>
                        </span>
                        <?php endif; ?>
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <span aria-current="page">
                                        <button class="active page-link dark:bg-fuchsia-600 dark:text-white dark:hover:bg-fuchsia-500 font-bold p-2 pr-4 pl-4 rounded-full"><?php echo e($page); ?></button>
                                    </span>
                                <?php else: ?>
                                    <a href="<?php echo e($url); ?>" class="page-link dark:text-white dark:hover:bg-fuchsia-400/25 p-2 pr-4 pl-4 rounded-full font-bold" aria-label="<?php echo e(__('Go to page :page', ['page' => $page])); ?>">
                                        <?php echo e($page); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </span>
            </div>
        </div>
    </nav>
<?php endif; ?><?php /**PATH /home/openduct/public_html/resources/views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>