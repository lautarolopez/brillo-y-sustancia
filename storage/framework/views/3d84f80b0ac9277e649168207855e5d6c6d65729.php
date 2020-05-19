<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('categories.create')); ?>" method="get">
    <button class="btn" >Agregar categoría</button>
</form>


    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($category->name); ?></h3>
        <form method="post" action="<?php echo e(route('categories.destroy', $category)); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <button>Eliminar esta categoría</button>
        </form>
        <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/categoriesIndex.blade.php ENDPATH**/ ?>