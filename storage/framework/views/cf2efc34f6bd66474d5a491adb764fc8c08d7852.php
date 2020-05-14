<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo e($product->name); ?>

        <form method="post" action="<?php echo e(route('deleteFromCart', $product->url)); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button class="btn" type="submit">Eliminar del carrite</button>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h6> No hay nada para mostrar flacucho </h6>
    <?php endif; ?>
    <?php if($products->isNotEmpty()): ?>
        <form method="post" action="<?php echo e(route('checkOutCart')); ?>">
            <?php echo csrf_field(); ?>
            <button class="btn" type="submit">Completar la compra</button>
        </form>    
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Edgar\Desktop\brillo-y-sustancia\resources\views/cart.blade.php ENDPATH**/ ?>