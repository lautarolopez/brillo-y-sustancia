<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $salesInformation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3>ID: "<?php echo e($sale['sale']->id); ?>"</h3>
        <h3>Purchase Date: "<?php echo e($sale['sale']->purchase_date); ?>"</h3>
        <?php if($sale['sale']->shipped): ?>
            <h3>Shipped!</h3>
            <?php if($sale['sale']->completed): ?>
                <h3>Completed!</h3>
            <?php else: ?>
                <form action="<?php echo e(route('sales.setCompleted', $sale['sale'])); ?>" method="post">
                    <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                    <button class="btn">Marcar como completado</button>
                </form>
            <?php endif; ?>
        <?php else: ?>
            <form action="<?php echo e(route('sales.setShipped', $sale['sale'])); ?>" method="post">
                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                <button type="submit" class="btn">Marcar como enviado</button>
            </form>
        <?php endif; ?>
        <div style="border:1px solid red">
            <ul>
                <?php $__currentLoopData = $sale['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style="background-color: purple"><?php echo e($product->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/salesIndex.blade.php ENDPATH**/ ?>