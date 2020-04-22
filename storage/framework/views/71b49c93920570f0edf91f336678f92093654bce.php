<?php echo csrf_field(); ?>
<label>
    Nombre: <br>
<input type="text" name="name" value="<?php echo e(old('name', $product->name)); ?>">
</label>
<label>
    Descripcion: <br> 
    <textarea name="description" value="<?php echo e(old('description', $product->description)); ?>"></textarea>
</label>
<label> 
    Precio: <br> 
    <input type="number" name="price" value="<?php echo e(old('price', $product->price)); ?>">
</label>
<label>
    Stock: <br>
    <input type="number" name="stock" value="<?php echo e(old('stock', $product->stock)); ?>">
</label>
<label>
    Category: <br>
    <input type="number" name="category_id" value="<?php echo e(old('category_id', $product->id_category)); ?>">
</label>
<label>
    URL: <br>
    <input type="text" name="url" value="<?php echo e(old('url', $product->url)); ?>">
</label>
<label>
    Imagen: <br>
    <input type="file" name="image">
</label>
<button><?php echo e($btnText); ?></button>
<?php /**PATH /home/lautarolopez/Desktop/brillo-y-sustancia/resources/views/products/_form.blade.php ENDPATH**/ ?>