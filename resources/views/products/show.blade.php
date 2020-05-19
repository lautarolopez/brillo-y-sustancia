@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

    <div class="container row">
        <div class="col-12 col-sm-6 mt-5 mb-5">
            <img src="https://http2.mlstatic.com/D_NQ_NP_851565-MLA31993371778_082019-O.webp">
        </div>
        <div class="col-12 mt-5 col-sm-6 mb-5">
            <h2>{{$product->name}}</h2>
            <p><strong>Precio ${{ $product->price }}</strong></p>
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

@stop