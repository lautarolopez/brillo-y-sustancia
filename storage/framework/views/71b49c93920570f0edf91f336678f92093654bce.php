<?php echo csrf_field(); ?>
<label>
    Nombre: <br>
<input type="text" name="name" value="<?php echo e(old('name', $product->name)); ?>">
</label>
<label>
    Descripcion: <br> 
    <textarea name="description"><?php echo e(old('description', $product->description)); ?></textarea>
</label>
<label> 
    Precio: <br> 
    <input type="number" name="price" step="0.01" min="0" value="<?php echo e(old('price', $product->price)); ?>">
</label>
<label>
    Stock: <br>
    <input type="number" name="stock" value="<?php echo e(old('stock', $product->stock)); ?>">
</label>
<label>
    Categoría: <br>
    <select name="category_id">
        <option value="0">Ninguna</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('category_id', $product->category_id) == $category->id): ?>
                <option value=<?php echo e($category->id); ?> selected><?php echo e($category->name); ?></option>    
            <?php else: ?>
                <option value=<?php echo e($category->id); ?>><?php echo e($category->name); ?></option>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</label>
<label>
    Imagen: <br>
    <input type="file" name="image">
</label>
<button><?php echo e($btnText); ?></button>
<?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/products/_form.blade.php ENDPATH**/ ?>