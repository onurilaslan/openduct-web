<?php if(Session::has('error')): ?>
    <span><?php echo e(Session::get('error')); ?></span>
<?php endif; ?>
<form method="POST" action="/login">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group">
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
    </div>
</form><?php /**PATH /home/openduct/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>