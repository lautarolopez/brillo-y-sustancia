@csrf
@error('name')
    <small>{{ $message }}</small>
@enderror
<input id="name" type="text"  name="name" placeholder="Nombre" class="@error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required autocomplete="name" autofocus>

@error('description')
    <small>{{ $message }}</small>
@enderror
<textarea name="description" placeholder="Descripción" class="@error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>

@error('price')
    <small>{{ $message }}</small>
@enderror
<input id="price" type="number" step="0.01" min="0" name="price" placeholder="Precio" class="@error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" required>

@error('stock')
    <small>{{ $message }}</small>
@enderror
<input id="stock" type="number" step="1" min="0" name="stock" placeholder="Stock" class="@error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" required>

@error('category_id')
    <small>{{ $message }}</small>
@enderror
<select name="category_id" class="@error('category_id') is-invalid @enderror">
    <option value="0">Categoría:</option>
    @foreach ($categories as $category)
        @if (old('category_id', $product->category_id) == $category->id)
            <option value={{ $category->id}} selected>{{$category->name}}</option>    
        @else
            <option value={{ $category->id}}>{{$category->name}}</option>
        @endif
    @endforeach
</select>


@error('image')
    <small>{{ $message }}</small>
@enderror
<div class="upload-file @error('image') is-invalid @enderror">
    <label for="image"><i class="fas fa-file-upload"></i><p class="p-description">Subir una imagen</p></label>
    <input type="file" name="image" id="image">
</div>


<button>{{ $btnText }}</button>


<script>
    let div = document.querySelector('.upload-file'); 
    let p = document.querySelector('.p-description');
    let input = document.querySelector('input#image');
    input.addEventListener('change', (e)=>{
        p.innerHTML = input.value.split("\\")[2];
        div.classList.remove('is-invalid');
    })
</script>