<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('admin-products.create')); ?>" method="get">
    <button class="btn" >Agregar producto</button>
</form>

    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3>Nombre: <?php echo e($product->name); ?></h3>
        <h3>Precio: $<?php echo e($product->price); ?></h3>
        <h3>Stock: <?php echo e($product->stock); ?></h3>
        <a href="<?php echo e(route('admin-products.edit', $product)); ?> ">Editar</a>    
        <form method="post" action="<?php echo e(route('admin-products.destroy', $product)); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button>Eliminar</button>
        </form>
        <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/productsIndex.blade.php ENDPATH**/ ?>