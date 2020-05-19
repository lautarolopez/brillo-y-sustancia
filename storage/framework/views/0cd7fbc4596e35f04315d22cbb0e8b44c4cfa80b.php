<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

<?php if(auth()->guard()->check()): ?>
    <div class="hero-profile">
        <div class="hero-filter"></div>
        <div class="img-profile">
            <img src="/storage/user_profile_pictures/<?php echo e($user->profile_img_url); ?>" alt="<?php echo e($user->profile_img_url); ?>">
        </div>
        <h2><?php echo e($user->name . " " . $user->last_name); ?></h2>
    </div>

    <div class="row container mt-5 mb-5">
        <div class="col-12 col-md-4 mb-5">
            <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action list-group-item-dark active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
            <a class="list-group-item list-group-item-action list-group-item-dark" id="list-editar-list" data-toggle="list" href="#list-editar" role="tab" aria-controls="editar">Editar perfil</a>
            <a class="list-group-item list-group-item-action list-group-item-dark" id="list-direcciones-list" data-toggle="list" href="#list-direcciones" role="tab" aria-controls="direcciones">Direcciones</a>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
            <div class="tab-pane fade" id="list-editar" role="tabpanel" aria-labelledby="list-editar-list">
                <form action="/editar-perfil" method="POST" class="edit-profile" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="id" value="<?php echo e($user->id); ?>" style="display:none">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input type="text" class="form-control" id="lastname" name="last_name" value="<?php echo e($user->last_name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_img">Foto de perfil</label>
                        <input type="file" class="form-control" id="profile_img" name="profile_img"> <!--value="<?php echo e($user->profile_img_url); ?>"-->
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="password-container">
                            <input type="password" class="form-control" id="password" name="password">
                            <span id="show_password" class="fa fa-fw fa-eye field-icon"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn radius-none btn-primary mb-2">Guardar cambios</button>
                </form>
            </div>
            <div class="tab-pane fade" id="list-direcciones" role="tabpanel" aria-labelledby="list-direcciones-list">
                <form action="/editar-direccion" method="POST" class="edit-profile">
                        <?php echo csrf_field(); ?>

                        <p>en desarrollo</p>
                        <input type="text" name="id" value="<?php echo e($user->id); ?>" style="display:none">
                        <div class="form-group">
                            <label for="street">Calle</label>
                            <input type="number" class="form-control" id="street" name="street" value="<?php echo e($user->name); ?>" required>
                            </div>
                        <div class="form-group">
                            <label for="address_number">Numero</label>
                            <input type="number" class="form-control" id="address_number" name="address_number" value="<?php echo e($user->last_name); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="floor">Piso</label>
                            <input type="number" class="form-control" id="floor" name="floor" value="<?php echo e($user->email); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="departament">Departamento</label>
                            <input type="text" class="form-control" id="departament" name="departament  " required>
                        </div>
                        <button type="submit" class="btn radius-none btn-primary mb-2">Guardar cambios</button>
                </form>
            </div>

        </div>
    </div>
<?php else: ?>
    <strong>QUE HACÉS ACÁ CONECTATE POR DIOS PAPÁ</strong>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Edgar\Desktop\brillo-y-sustancia\resources\views/profile.blade.php ENDPATH**/ ?>