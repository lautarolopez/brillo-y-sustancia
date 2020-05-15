<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('partials.validation-errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form class="passwords-form" method="POST" action="<?php echo e(route('addresses.store')); ?>">
        <?php echo csrf_field(); ?>
        <h2>Nueva dirección</h2>

        <input type="text" name= "street" id="street" placeholder="Calle" required>
        <input type="number" name= "address_number" id="address_number" placeholder="Número" required>
        <input type="text" name= "floor" id="floor" placeholder="Piso" >
        <input type="text" name= "departament" id="departament" placeholder="departamento" >
        <input type="hidden" name="cart" value=<?php echo e($cart); ?>>
        <button type="submit" class="btn">Guardar</button>
    </form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/addresses/create.blade.php ENDPATH**/ ?>