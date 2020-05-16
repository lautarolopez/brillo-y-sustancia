<?php $__env->startSection('content'); ?>




    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($user->last_name . ", " . $user->name); ?></h3>
        <form action="<?php echo e(route('users.changePermissions', $user)); ?>" method="post">
            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
            <?php if($user->isAdmin): ?>
                <button type="submit" class="btn">Quitar permisos de administrador</button>
            <?php else: ?>
                <button type="submit" class="btn">Hacer admnistrador</button>
            <?php endif; ?>
        </form>
        <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/usersIndex.blade.php ENDPATH**/ ?>