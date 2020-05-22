@extends('layouts.main_layout')

@section('title', $product->name)

@section('content')

    <div class="container row">
        <div class="col-12 col-sm-6 mt-5 mb-5 image-container-product">
            <img class="image-product" src="/storage/product_pictures/{{$product->img_url }}" alt="{{$product->name}}">
        </div>
        <div class="col-12 mt-5 col-sm-6 mb-5 pl-5">
            <h2 class="name-product">{{$product->name}}</h2>
            <p class="price-product">$ {{ $product->price }}</p>
            <p><small>Stock {{ $product->stock}}</small></p>
            @if ($category)
                <p><small>Category: {{ $category  }}</small></p>
            @endif
            <a href=" {{ route('addToCart', $product ) }} " class="btn radius-none">Agregar al carrito</a>
        </div>
    </div>
    <div class="container mb-5">
        <h4>Descripción</h4>
        <p>{{ $product->description }}</p>
    </div>
    <div class="container">
        <h4>Productos relacionados</h4>
        <div class="products-container">
            @foreach($products as $product)
                <a href="{{$product->url}}" class="a-none-default">
                    <div class="product-relation">
                        <img src="/storage/product_pictures/{{$product->img_url }}" alt="{{$product->name}}">
                        <h5>$ {{$product->price}}</h5>
                        <p>{{$product->name}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@stop