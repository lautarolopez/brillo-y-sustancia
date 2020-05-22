<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session()->pull('sale_success')): ?> 
        <div class="span-container">
            <span class="success"><p>Compra finalizada! </p><i class="far fa-thumbs-up"></i></span>
        </div>
    <?php endif; ?>
    <?php if(session()->pull('sale_failure', false)): ?>
        <div class="span-container">
            <span class="failure"><p>Compra rechazada </p><i class="far fa-thumbs-down"></i></span>
        </div>
    <?php endif; ?>
    <section class="social-container">
        <img src="../storage/PrideBackground.png" alt="pride-background">
        <span>
            <a class="fb" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="tw" href="#"><i class="fab fa-twitter"></i></a>
            <a class="ig" href="#"><i class="fab fa-instagram"></i></a>
        </span>
    </section>

    <!--FIN JUMBOTRON REDES SOCIALES -->

    <!-- PREGUNTAS FRECUENTES -->

    <section class="faq" id="faq">
        <article class="row align-items-center text-center justify-content-left top-buffer mb-5">
            <h2 class="col-12">Preguntas frecuentes</h2>
        </article>
        <article class="row align-items-center text-center justify-content-left top-buffer mx-5">
            <div class="col-sm-12 col-md-6">
                <h3>¿Lorem, ipsum dolor sit amet consectetur adipisicing elit?</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias unde nulla similique pariatur, eum, veritatis quo quos ad quidem doloremque dignissimos et voluptates at aliquam consectetur veniam optio! Est, accusantium?</p>
            </div>
            <div class="col-sm-12 col-md-6">
                <h3>¿Lorem, ipsum dolor sit amet consectetur adipisicing elit?</h3>
                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias unde nulla similique pariatur, eum, veritatis quo quos ad quidem doloremque dignissimos et voluptates at aliquam consectetur veniam optio! Est, accusantium?</p>
            </div>
        </article>
    </section>

    <!-- FIN PREGUNTAS FRECUENTES -->

    <section class="contact" id="contact">
        <article class="ancho-interior">
            <h2 class="contact-title">Contactanos!</h2>
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show role="alert">
                        <?php echo e(session()->get('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            <form action="/send" method="post">
                <?php echo csrf_field(); ?>
                <span>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="alert alert-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input name="name" type="text" class="name <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tu nombre" required value= <?php echo e(old('name')); ?>>
                </span>
                
                <span>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="alert alert-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input name="email" type="email" class="email <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tu email" required value= <?php echo e(old('email')); ?>>
                </span>
                
                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="alert alert-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <textarea name= "message" placeholder="Tu mensaje" class="message <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required value= <?php echo e(old('message')); ?>></textarea>
                <button type="submit" class="btn">Enviar</button>
            </form>
        </article>
    </section>

<script>
    let div = document.querySelector('div.span-container');
    if (div){
        let span = div.firstElementChild;
        setTimeout(() => {
            span.classList.add('appear');
        }, 1);
        setTimeout(() => {
            span.classList.remove('appear');
            span.classList.add('vanish');
        }, 7000);
        setTimeout(() => {
            div.parentNode.removeChild(div);
        }, 7100);
    }    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/home.blade.php ENDPATH**/ ?>