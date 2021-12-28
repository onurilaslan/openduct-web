<?php $__env->startSection('content'); ?>
    <div class="bg-light p-4 rounded">
        <h1>Show user</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Name: <?php echo e($user->name); ?>

            </div>
            <div>
                Email: <?php echo e($user->email); ?>

            </div>
            <div>
                Username: <?php echo e($user->username); ?>

            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-info">Edit</a>
        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default">Back</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/openduct/public_html/resources/views/users/show.blade.php ENDPATH**/ ?>