<?php $__env->startSection('content'); ?>
<div class="bg-light p-4 rounded">
    <h2>Update post</h2>
    <div class="lead">
        Edit post.
    </div>

    <div class="container mt-4">

        <form method="POST" action="<?php echo e(route('posts.update', $post->id)); ?>">
            <?php echo method_field('patch'); ?>
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="<?php echo e($post->title); ?>" 
                    type="text" 
                    class="form-control" 
                    name="title" 
                    placeholder="Title" required>

                <?php if($errors->has('title')): ?>
                    <span class="text-danger text-left"><?php echo e($errors->first('title')); ?></span>
                <?php endif; ?>
            </div>

            <div class="mb-3 w-full">
                <label for="body" class="form-label">Content:</label>
                <textarea
                    type="text" 
                    class="form-control w-full" 
                    name="content" 
                    placeholder="Body" required><?php echo e($post->content); ?></textarea>

                <?php if($errors->has('content')): ?>
                    <span class="text-danger text-left"><?php echo e($errors->first('content')); ?></span>
                <?php endif; ?>
            </div>
            

            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-default">Back</a>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/openduct/public_html/resources/views/posts/edit.blade.php ENDPATH**/ ?>