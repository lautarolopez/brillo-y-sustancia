<?php $__env->startSection('title', 'Categorías'); ?>
<?php $__env->startSection('content'); ?>

<h2 class="title">Categorías</h2>

<form class="single-button-form" action="<?php echo e(route('categories.create')); ?>" method="get">
    <button class="btn index-action" >Nueva categoría</button>
</form>

    <ul class="items-list">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="categories-li">
                <span class="items-info">
                    <strong>Nombre: </strong>
                    <p style="text-transform: capitalize"><?php echo e($category->name); ?></p>
                    <strong>Cantidad de productos:</strong>
                    <p><?php echo e($category->products->count()); ?></p>
                </span>
                <form method="post" action="<?php echo e(route('categories.destroy', $category)); ?>">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn">Eliminar esta categoría</button>
                </form>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/categoriesIndex.blade.php ENDPATH**/ ?>