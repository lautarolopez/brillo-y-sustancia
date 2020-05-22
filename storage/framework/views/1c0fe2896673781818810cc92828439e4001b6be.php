<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>

    <div class="container row">
        <div class="col-12 col-sm-6 mt-5 mb-5 image-container-product">
            <?php if($product->stock !== 0): ?>
                <img class="image-product" src="/storage/product_pictures/<?php echo e($product->img_url); ?>" alt="<?php echo e($product->name); ?>">
            <?php else: ?>
                <img class="image-product no-stock" src="/storage/product_pictures/<?php echo e($product->img_url); ?>" alt="<?php echo e($product->name); ?>">
            <?php endif; ?>
        </div>
        <div class="col-12 mt-5 col-sm-6 mb-5 pl-5">
            <h2 class="name-product"><?php echo e($product->name); ?></h2>
            <p class="price-product">$ <?php echo e($product->price); ?></p>
            <?php if($product->stock !== 0): ?>
                <p><small>Stock <?php echo e($product->stock); ?></small></p>
            <?php else: ?>
                <p style="color: red"><small>No hay stock</small></p>
            <?php endif; ?>
            <?php if($category): ?>
                <p><small>Category: <?php echo e($category); ?></small></p>
            <?php endif; ?>
            <?php if($product->stock !== 0): ?>
                <a href=" <?php echo e(route('addToCart', $product )); ?> " class="btn radius-none">Agregar al carrito</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="container mb-5">
        <h4>Descripción</h4>
        <p><?php echo e($product->description); ?></p>
    </div>
    <div class="container">
        <h4>Productos relacionados</h4>
        <div class="products-container">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($product->url); ?>" class="a-none-default">
                    <div class="product-relation">
                        <?php if($product->stock !== 0): ?>
                            <img src="/storage/product_pictures/<?php echo e($product->img_url); ?>" alt="<?php echo e($product->name); ?>">
                        <?php else: ?>
                            <img class="no-stock" src="/storage/product_pictures/<?php echo e($product->img_url); ?>" alt="<?php echo e($product->name); ?>">
                        <?php endif; ?>
                        <?php if($product->stock !== 0): ?>
                            <h5>$ <?php echo e($product->price); ?></h5>
                        <?php else: ?>
                            <h5 style="color: red">SIN STOCK</h5>
                        <?php endif; ?>
                        
                        <p><?php echo e($product->name); ?></p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/products/show.blade.php ENDPATH**/ ?>