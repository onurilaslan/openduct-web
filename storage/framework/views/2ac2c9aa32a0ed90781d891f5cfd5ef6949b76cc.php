<?php if(auth()->guard()->check()): ?>
<h2>new post</h2>
<?php if(session()->get('error')): ?>
    <span>Error: <?php echo e(session()->get('error')); ?></span>
<?php endif; ?>
<form method="POST" action="/new">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<?php endif; ?><?php /**PATH /home/openduct/public_html/resources/views/blog/create.blade.php ENDPATH**/ ?>