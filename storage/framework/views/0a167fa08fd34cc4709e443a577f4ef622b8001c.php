<?php $__env->startSection('title', 'Usuarios registrados'); ?>
<?php $__env->startSection('content'); ?>


    <h2 class="title">Usuarios registrados</h2>

    <form class="single-button-form" action="<?php echo e(route('cleanCarts')); ?>" method="get">
        <button type="submit" class="btn">Limpiar carritos inactivos</button>
    </form>

    <ul class="items-list">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <span class="item-info">
                    <img src="/storage/user_profile_pictures/<?php echo e($user->profile_img_url); ?>" alt="<?php echo e($user->profile_img_url); ?>">
                    <span>
                        <strong>Nombre:</strong>
                        <p><?php echo e($user->last_name . ", " . $user->name); ?></p>
                        <strong>Email:</strong> 
                        <p><?php echo e($user->email); ?></p>
                    </span>
                </span>
                <form action="<?php echo e(route('users.changePermissions', $user)); ?>" method="post">
                    <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                    <?php if($user->isAdmin): ?>
                        <button type="submit" class="btn">Quitar permisos de administrador</button>
                    <?php else: ?>
                        <button type="submit" class="btn">Hacer admnistrador</button>
                    <?php endif; ?>
                </form>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Edgar\Desktop\brillo-y-sustancia\resources\views/admin/usersIndex.blade.php ENDPATH**/ ?>