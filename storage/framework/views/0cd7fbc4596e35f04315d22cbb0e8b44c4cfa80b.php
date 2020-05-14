<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

<?php if(auth()->guard()->check()): ?>
    <div class="hero-profile">
        <div class="img-profile">
            <img src="../storage/<?php echo e($user->profile_img_url); ?>" alt="Profile picture">
        </div>
        <h2><?php echo e($user->name . " " . $user->last_name); ?></h2>
    </div>
    <div class="row container">
        <div class="col-4 mt-5 mb-5">
            <div class="list-group" id="list-tab" role="tablist">
                <form action="profile.php" method="POST">
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-home-list" data-toggle="list" href="#" role="tab" aria-controls="home">Perfil</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-profile-list" data-toggle="list" href="#" role="tab" aria-controls="profile">Mis compras</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-messages-list" data-toggle="list" href="#" role="tab" aria-controls="messages">Direcciones</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-settings-list" data-toggle="list" href="#" role="tab" aria-controls="settings">Editar perfil</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-settings-list" data-toggle="list" href="#" role="tab" aria-controls="settings">Métodos de pago</button>
                    <button class="list-group-item list-group-item-action list-group-item-light" id="list-settings-list" type="submit" name="close" value="close" href="#" role="tab" aria-controls="settings">Cerrar sesión</button>
                </form>
            </div>
        </div>
        <div class="col-8 mt-5 mb-5 information">
            <a class="text-white">Acá va la informacion de cada item</a>
        </div>
    </div>
<?php else: ?>
    <strong>QUE HACÉS ACÁ CONECTATE POR DIOS PAPÁ</strong>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Edgar\Desktop\brillo-y-sustancia\resources\views/profile.blade.php ENDPATH**/ ?>