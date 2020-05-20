@extends('layouts.main_layout')

@section('title', $category)

@section('content')
  <section class="products-container">
    <h2>{{$category}}</h2>
    <ul class="product-list">
        @forelse ($products as $product)
          <li>
            <article class="product-card">
              <a class="img-container" href="{{route('products.show', $product)}}">
                @if ($product->stock !== 0)
                  <img src= {{"../../storage/product_pictures/" . $product->img_url }} alt= {{ $product->name }}}> 
                @else
                  <img class="no-stock" src= {{"../../storage/product_pictures/" . $product->img_url }} alt= {{ $product->name }}}>
                @endif
              </a>
              <div class="inside-container">
                <a href="{{route('products.show', $product)}}">
                  <h6 class="product-name">{{ $product->name }}</h6>
                </a>
                <div id={{ $product->id . "item" }} class="product-info">  
                    <p class="product-description">{{ $product->description }}</p>
                </div>
                <span class="card-footer">
                    @if ($product->stock !== 0)
                      <a href="{{ route('addToCart', $product ) }}"><i class="fas fa-cart-plus"></i></a>
                      <p class="product-price">${{ $product->price }}</p>
                    @else
                      <a><i class="fas fa-ban"></i></a>
                      <p class="product-price" style="color: red; text-transform: uppercase">Sin stock</p>
                    @endif
                    <i id={{ $product->id . 'chevron'}} class="fas fa-chevron-down" onclick='buttonToggler({{$product->id}})'></i>
                </span>
              </div>
            </article>
          </li>
        @empty
          <p>No hay nada para mostrar</p>
        @endforelse
    </ul>
    <div class="pagination-container">
        {{ $products->links() }} 
    </div>  
  </section>
@stop

<script>
  let buttonToggler = (id) => {
    document.getElementById(id + "item").classList.toggle("product-collapse")      
    document.getElementById(id + "chevron").classList.toggle("fa-chevron-down")
    document.getElementById(id + "chevron").classList.toggle("fa-chevron-up")
  }
</script>