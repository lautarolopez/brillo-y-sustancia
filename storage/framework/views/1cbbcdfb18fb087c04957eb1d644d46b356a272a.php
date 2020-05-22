<?php $__env->startSection('title', 'Procesar pago'); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="title">Procesar pago</h2>
    <div class="mp-logo-container">
        <img class="mp-logo" src="https://logodownload.org/wp-content/uploads/2019/06/mercado-pago-logo-3.png" alt="mercado-pago-loco">
    </div>
    <form class="single-button-form" action="procesar-pago" method="post">
        <?php echo csrf_field(); ?>
        <script
        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" 
        data-preference-id=<?php echo e($preference->id); ?>>
        </script>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/mp_checkout.blade.php ENDPATH**/ ?>