<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

<form class="passwords-form" method="POST" action="<?php echo e(route('admin-products.update', $product)); ?>" enctype="multipart/form-data">
    <?php echo method_field('PATCH'); ?>
    <h2>Editar producto</h2>    
    <?php echo $__env->make('products._form', [ 'btnText' => 'Actualizar' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/products/edit.blade.php ENDPATH**/ ?>