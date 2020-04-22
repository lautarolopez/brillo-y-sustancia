<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

  <ul>
      <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li><?php echo e($product->name); ?> <br> <small> <?php echo e($product->description); ?></small></li>
        <a href="<?php echo e(route('products.show', $product)); ?>"><img src= <?php echo e("../storage/" . $product->img_url); ?> alt= <?php echo e($product->name); ?>}></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No hay nada para mostrar</p>
      <?php endif; ?>
  </ul>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/products/index.blade.php ENDPATH**/ ?>