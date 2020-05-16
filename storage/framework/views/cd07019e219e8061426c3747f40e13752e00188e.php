<?php $__env->startSection('title', 'Finalizar compra'); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('completeSale')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="radio" id=<?php echo e($address->id); ?> name="address" value=<?php echo e($address->id); ?>>
            <label for=<?php echo e($address->id); ?>> <?php echo e($address->street); ?> </label>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a class="btn" href=<?php echo e(route('addresses.create', [$cart])); ?>>Agregar una dirección nueva</a>
        <?php if($cart): ?>
            <button class="btn" type="submit">Continuar</button>    
        <?php endif; ?>
        
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/addresses/index.blade.php ENDPATH**/ ?>