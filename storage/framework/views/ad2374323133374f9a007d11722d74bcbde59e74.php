<?php $__env->startSection('title', 'Reiniciá tu contraseña'); ?>

<?php $__env->startSection('content'); ?>
    <form class="passwords-form" method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo csrf_field(); ?>

        <h2>Reiniciá tu contraseña</h2>

        <input id="email" type="email" name="email" placeholder="Correo electrónico"  value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <button type="submit" class="btn">
            Enviar link
        </button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>