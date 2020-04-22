<header>
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Brillo y Sustancia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#contact">Contactanos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorías
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('products.index')); ?>">Productos</a>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item" href="<?php echo e(route('products.index.category', $category->name)); ?>"><?php echo e($category->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <?php if(auth()->guard()->check()): ?>
                        <a class="link-icons" href="<?php echo e(route('cart')); ?>"><i class="fas fa-shopping-cart mx-2"></i></a>
                        <a class="link-icons" href="<?php echo e(route('profile')); ?>"><i class="far fa-user mx-2"></i></a>
                        <a class="btn my-2 my-sm-0 mx-1" href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit()">
                            Cerrar sesión    
                        </a>   
                    <?php else: ?> 
                        <a class="btn my-2 my-sm-0 mx-1" href="<?php echo e(route('login')); ?>">Ingresá</a>
                        <a class="btn my-2 my-sm-0 mx-1" href="<?php echo e(route('register')); ?>">Registrate</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none">
            <?php echo csrf_field(); ?>
        </form>
    </header><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/partials/header.blade.php ENDPATH**/ ?>