<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
  <section class="products-container">
    <h2><?php echo e($category); ?></h2>
    <ul class="product-list">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <li>
            <article class="product-card">
              <a class="img-container" href="<?php echo e(route('products.show', $product)); ?>">
                <img src= <?php echo e("../../storage/" . $product->img_url); ?> alt= <?php echo e($product->name); ?>}>
              </a>
              <div class="inside-container">
                <a href="<?php echo e(route('products.show', $product)); ?>">
                  <h6 class="product-name"><?php echo e($product->name); ?></h6>
                </a>
                <div id=<?php echo e($product->id . "item"); ?> class="product-info">  
                    <p class="product-description"><?php echo e($product->description); ?></p>
                </div>
                <span class="card-footer">
                    <a href="<?php echo e(route('addToCart', $product )); ?>"><i class="fas fa-cart-plus"></i></a>
                    <p class="product-price">$<?php echo e($product->price); ?></p>
                    <i id=<?php echo e($product->id . 'chevron'); ?> class="fas fa-chevron-down" onclick='buttonToggler(<?php echo e($product->id); ?>)'></i>
                </span>
              </div>
            </article>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <p>No hay nada para mostrar</p>
        <?php endif; ?>
    </ul>
    <div class="pagination-container">
        <?php echo e($products->links()); ?> 
    </div>  
  </section>
<?php $__env->stopSection(); ?>

<script>
  let buttonToggler = (id) => {
    document.getElementById(id + "item").classList.toggle("product-collapse")      
    document.getElementById(id + "chevron").classList.toggle("fa-chevron-down")
    document.getElementById(id + "chevron").classList.toggle("fa-chevron-up")
  }
</script>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/products/index.blade.php ENDPATH**/ ?>