<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>


<form class="passwords-form" method="POST" action="<?php echo e(route('admin-products.store')); ?>" enctype="multipart/form-data">
    <h2>Cargar nuevo producto</h2>
    <?php echo $__env->make('products._form', [ 'btnText' => 'Guardar' ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Edgar\Desktop\brillo-y-sustancia\resources\views/products/create.blade.php ENDPATH**/ ?>