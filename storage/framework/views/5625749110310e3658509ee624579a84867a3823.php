<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
<h1>Welcome, <?php echo e(auth()->user()->name); ?></h1>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/openduct/public_html/resources/views/welcome.blade.php ENDPATH**/ ?>