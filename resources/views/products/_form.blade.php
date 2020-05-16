@csrf
<label>
    Nombre: <br>
<input type="text" name="name" value="{{ old('name', $product->name) }}">
</label>
<label>
    Descripcion: <br> 
    <textarea name="description">{{ old('description', $product->description) }}</textarea>
</label>
<label> 
    Precio: <br> 
    <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}">
</label>
<label>
    Stock: <br>
    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
</label>
<label>
    Categoría: <br>
    <select name="category_id">
        <option value="0">Ninguna</option>
        @foreach ($categories as $category)
            @if (old('category_id', $product->category_id) == $category->id)
                <option value={{ $category->id}} selected>{{$category->name}}</option>    
            @else
                <option value={{ $category->id}}>{{$category->name}}</option>
            @endif
        @endforeach
    </select>
</label>
<label>
    Imagen: <br>
    <input type="file" name="image">
</label>
<button>{{ $btnText }}</button>
