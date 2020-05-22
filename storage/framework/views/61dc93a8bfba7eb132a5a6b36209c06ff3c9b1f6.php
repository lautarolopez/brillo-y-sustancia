<?php $__env->startSection('title', 'Listado de ventas'); ?>
<?php $__env->startSection('content'); ?>

    <h2 class="title">Listado de ventas</h2>

    <ul class="items-list">
        <?php $__currentLoopData = $salesInformation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="sales">
                <span class="item-info">
                    <strong>Cliente:</strong>
                    <p><?php echo e($sale['client']->name . ", " . $sale['client']->last_name); ?></p>
                    <strong>Dirección:</strong>
                    <p><?php echo e($sale['address']->street . ", " . $sale['address']->address_number); ?>

                        <?php if($sale['address']->floor): ?>
                            <p>piso <?php echo e($sale['address']->floor); ?></p>
                        <?php endif; ?>
                        <?php if($sale['address']->departament): ?>
                            <p>depto. <?php echo e($sale['address']->departament); ?></p>
                        <?php endif; ?>
                    </p>
                    <strong>Fecha de compra:</strong>
                    <p><?php echo e($sale['sale']->purchase_date); ?></p>
                    <strong>Productos:</strong>
                    <p class="enum-paragraph">
                        <?php $__currentLoopData = $sale['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($product->name); ?> $<?php echo e($product->price); ?> x<?php echo e($product->pivot->quantity); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                    <strong>Total:</strong>
                    <p>$<?php echo e(collect($sale['products'])->reduce(function ($total, $prod) {
                        return $total + ($prod->price * $prod->pivot->quantity); 
                    })); ?></p>
                    <?php if($sale['sale']->shipped): ?>
                        <i class="fas fa-shipping-fast"></i>
                        <?php if($sale['sale']->completed): ?>
                            <i class="far fa-check-circle"></i>
                        <?php else: ?>
                            <form class="single-button-form" action="<?php echo e(route('sales.setCompleted', $sale['sale'])); ?>" method="post">
                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                <button class="btn">Marcar como completado</button>
                            </form>
                        <?php endif; ?>
                    <?php else: ?>
                        <form class="single-button-form" action="<?php echo e(route('sales.setShipped', $sale['sale'])); ?>" method="post">
                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="btn">Marcar como enviado</button>
                        </form>
                    <?php endif; ?>
                </span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    
    
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




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/salesIndex.blade.php ENDPATH**/ ?>