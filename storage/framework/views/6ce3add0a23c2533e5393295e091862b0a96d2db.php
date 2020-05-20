<?php $__env->startSection('title', 'Listado de productos'); ?>
<?php $__env->startSection('content'); ?>

<h2 class="title">Listado de productos</h2>

<form class="single-button-form" action="<?php echo e(route('admin-products.create')); ?>" method="get">
    <button class="btn" >Agregar producto</button>
</form>

    <ul class="items-list">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <span class="item-info">
                    <img src=<?php echo e("../../storage/product_pictures/" . $product->img_url); ?> alt="<?php echo e($product->name); ?>">
                    <span>
                        <strong>Nombre:</strong>
                        <p style="text-transform: capitalize"><?php echo e($product->name); ?></p>
                        <strong>Precio:</strong>
                        <p>$<?php echo e($product->price); ?></p>
                        <strong>Stock:</strong>
                        <p><?php echo e($product->stock); ?></p>
                        <strong>Categoría</strong>
                        <?php if($product->category): ?>
                            <p style="text-transform: capitalize"><?php echo e($product->category->name); ?></p>
                        <?php else: ?>
                            <p>No tiene</p>
                        <?php endif; ?>
                        <strong>Descripción</strong>
                        <p class="description-paragraph"><?php echo e($product->description); ?></p>
                    </span>
                </span>
                <a style="margin-bottom: 30px"class="btn" href="<?php echo e(route('admin-products.edit', $product)); ?> ">Editar</a>    
                <form method="post" action="<?php echo e(route('admin-products.destroy', $product)); ?>">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button style="width: 100%" class="btn">Eliminar</button>
                </form>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/productsIndex.blade.php ENDPATH**/ ?>