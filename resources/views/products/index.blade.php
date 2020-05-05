@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')
  <section class="products-container">
    <h2>{{$category}}</h2>
    <ul>
        @forelse ($products as $product)
          <li>
        <article class="product-card">
          <a href="{{route('products.show', $product)}}">
            <img src= {{"../storage/" . $product->img_url }} alt= {{ $product->name }}}>
          </a>
          <div class="inside-container">
            <a href="{{route('products.show', $product)}}">
              <h6 class="product-name">{{ $product->name }}</h6>
            </a>
            <div id={{ $product->id . "item" }} class="product-info">  
                <p class="product-description">{{ $product->description }}</p>
            </div>
            <span class="card-footer">
                <a href="{{ route('addToCart', $product ) }}"><i class="fas fa-cart-plus"></i></a>
                <p class="product-price">${{ $product->price }}</p>
                <i id={{ $product->id . 'chevron'}} class="fas fa-chevron-down" onclick='buttonToggler({{$product->id}})'></i>
            </span>
          </div>
        </article>
      </li>
        @empty
          <p>No hay nada para mostrar</p>
        @endforelse
    </ul>    
  </section>
@stop

<script>
  let buttonToggler = (id) => {
    document.getElementById(id + "item").classList.toggle("product-collapse")      
    document.getElementById(id + "chevron").classList.toggle("fa-chevron-down")
    document.getElementById(id + "chevron").classList.toggle("fa-chevron-up")
  }
</script>