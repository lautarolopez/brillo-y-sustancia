<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    
    <?php if($products->isNotEmpty()): ?>
        <form method="post" action="<?php echo e(route('checkOutCart')); ?>">
            <?php echo csrf_field(); ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($product->name); ?>

                <a class="btn" href="#" onclick='deleteItem(event, "<?php echo e($product->url); ?>")'><i class="fas fa-ban"></i></a>
                <button class="btn" onclick='minus(event, "<?php echo e($product->id); ?>")'><i class="fas fa-minus"></i></button>
                <input type="number" min="1" id=<?php echo e($product->id . "inputdata"); ?> name=<?php echo e($product->id); ?> value=<?php echo e($product->pivot->quantity); ?>>
                <button class="btn" onclick='plus(event, "<?php echo e($product->id); ?>", "<?php echo e($product->stock); ?>")'><i class="fas fa-plus"></i></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button class="btn" type="submit">Completar la compra</button>
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

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/cart.blade.php ENDPATH**/ ?>