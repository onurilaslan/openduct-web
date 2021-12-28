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

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input value="<?php echo e($post->description); ?>" 
                    type="text" 
                    class="form-control" 
                    name="description" 
                    placeholder="Description" required>

                <?php if($errors->has('description')): ?>
                    <span class="text-danger text-left"><?php echo e($errors->first('description')); ?></span>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea
                    type="text" 
                    class="form-control" 
                    name="body" 
                    placeholder="Body" required><?php echo e($post->body); ?></textarea>

                <?php if($errors->has('body')): ?>
                    <span class="text-danger text-left"><?php echo e($errors->first('body')); ?></span>
                <?php endif; ?>
            </div>
            

            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-default">Back</a>
        </form>
    </div>

</div><?php /**PATH /home/openduct/public_html/resources/views/blog/edit.blade.php ENDPATH**/ ?>