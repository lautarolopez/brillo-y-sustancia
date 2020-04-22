@csrf
<label>
    Nombre: <br>
<input type="text" name="name" value="{{ old('name', $product->name) }}">
</label>
<label>
    Descripcion: <br> 
    <textarea name="description" value="{{ old('description', $product->description) }}"></textarea>
</label>
<label> 
    Precio: <br> 
    <input type="number" name="price" value="{{ old('price', $product->price) }}">
</label>
<label>
    Stock: <br>
    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
</label>
<label>
    Category: <br>
    <input type="number" name="category_id" value="{{ old('category_id', $product->id_category) }}">
</label>
<label>
    URL: <br>
    <input type="text" name="url" value="{{ old('url', $product->url) }}">
</label>
<label>
    Imagen: <br>
    <input type="file" name="image">
</label>
<button>{{ $btnText }}</button>
