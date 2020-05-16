<?php $__env->startSection('content'); ?>


    <form class="passwords-form" action="<?php echo e(route('categories.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <h2>Agregar una nueva categoría</h2>
        
        <input type="text" placeholder="Nombre" name="name" value="<?php echo e(old('name', $category->name)); ?>">
        <button type="submit">Guardar</button>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/createCategory.blade.php ENDPATH**/ ?>