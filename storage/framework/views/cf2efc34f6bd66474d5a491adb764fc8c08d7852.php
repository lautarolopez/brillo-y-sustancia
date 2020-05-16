<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    
    <?php if($products->isNotEmpty()): ?>
        <form method="post" action="<?php echo e(route('checkOutCart')); ?>" class="container form-cart">
            <?php echo csrf_field(); ?>
            <h2 class="title">Carrito</h2>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-cart">
                    <div>
                        <h4><?php echo e($product->name); ?></h4>
                        <div class="product">
                            <button class="btn radius-none" onclick='minus(event, "<?php echo e($product->id); ?>")'><i class="fas fa-minus"></i></button>
                            <input type="number" class="form-control" min="1" id=<?php echo e($product->id . "inputdata"); ?> name=<?php echo e($product->id); ?> value=<?php echo e($product->pivot->quantity); ?>>
                            <button class="btn radius-none" onclick='plus(event, "<?php echo e($product->id); ?>", "<?php echo e($product->stock); ?>")'><i class="fas fa-plus"></i></button>
                            <a class="btn radius-none" href="#" onclick='deleteItem(event, "<?php echo e($product->url); ?>")'>Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <button class="btn radius-none center" type="submit">Completar la compra</button>
        </form>
        <form id="delete-item-form" method="post" action="<?php echo e(route('deleteFromCart')); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
            <input type="hidden" name="url" id="hiddenInput">
        </form>
    <?php endif; ?>    
<?php $__env->stopSection(); ?>

<script>
    let minus = (e, id) => {
        e.preventDefault();
        let input = document.getElementById(id + "inputdata");
        if (input.value > 1) {
            input.setAttribute('value', input.value--);
        }
    }

    let plus = (e, id, stock) => {
        e.preventDefault();
        let input = document.getElementById(id + "inputdata");
        if (input.value + 1 < stock){ 
            input.setAttribute('value', input.value++);
        } else {
            alert("No tenemos tanto stock! :/")
        }
    }

    let deleteItem = (e, url) => {
        e.preventDefault();
        document.getElementById('hiddenInput').value = url;
        document.getElementById('delete-item-form').submit();
    }
</script>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Edgar\Desktop\brillo-y-sustancia\resources\views/cart.blade.php ENDPATH**/ ?>