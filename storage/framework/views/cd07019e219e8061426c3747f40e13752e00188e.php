<?php $__env->startSection('title', 'Finalizar compra'); ?>

<?php $__env->startSection('content'); ?>

    <?php if($cart): ?>
        <h2 class="title">Elegir dirección</h2>
    <?php else: ?>
        <h2 class="title">Mis direcciones</h2>
    <?php endif; ?>
    <form class="addresses-form" action="<?php echo e(route('completeSale')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="address-container">
                <?php if($cart): ?>
                    <input type="radio" id=<?php echo e($address->id); ?> name="address" value=<?php echo e($address->id); ?>> 
                    <label for=<?php echo e($address->id); ?>> 
                        <p style="margin: 0">Dirección: <?php echo e($address->street); ?>, <?php echo e($address->address_number); ?></p>
                        <?php if($address->floor): ?>
                            <p style="margin: 0">Piso: <?php echo e($address->floor); ?></p>
                        <?php endif; ?>
                        <?php if($address->street): ?>
                            <p style="margin: 0">Departamento: <?php echo e($address->departament); ?></p>
                        <?php endif; ?>
                    </label>                    
                <?php else: ?>
                    <span>
                        <p style="margin: 0">Dirección: <?php echo e($address->street); ?>, <?php echo e($address->address_number); ?></p>
                        <?php if($address->floor): ?>
                            <p style="margin: 0">Piso: <?php echo e($address->floor); ?></p>
                        <?php endif; ?>
                        <?php if($address->street): ?>
                            <p style="margin: 0">Departamento: <?php echo e($address->departament); ?></p>
                        <?php endif; ?>
                        <hr>
                    </span>
                <?php endif; ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <span class="alert"></span>
        <a class="btn" style="margin-bottom: 30px" href=<?php echo e(route('addresses.create', [$cart])); ?>>Agregar una dirección nueva</a>
        <?php if($cart): ?>
            <button class="btn" style="margin-bottom: 30px" type="submit">Continuar</button>    
        <?php endif; ?>        
    </form>

<script>
    let formAddresses = document.querySelector('form.addresses-form'); 
    formAddresses.addEventListener('submit', (e) => {
        e.preventDefault();
        let radios = document.querySelectorAll('input[type=radio]:checked')
        if(radios.length === 0){
            alertElement = document.createElement('small');
            alertElement.innerHTML = "Tenés que elegir una dirección!";
            alertElement.style.color = "red";
            document.querySelector('span.alert').appendChild(alertElement);
        } else {
            formAddresses.submit();
        }
    })
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/addresses/index.blade.php ENDPATH**/ ?>