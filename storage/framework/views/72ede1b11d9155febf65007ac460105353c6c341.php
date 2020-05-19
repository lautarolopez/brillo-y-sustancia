<?php $__env->startSection('title', 'Panel de administración'); ?>
<?php $__env->startSection('content'); ?>




    <h1>BENVENUTI</h1>

    <form action="<?php echo e(route('cleanCarts')); ?>" method="get">
        <button type="submit" class="btn">Limpiar carritos inactivos</button>
    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>