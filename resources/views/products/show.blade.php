@extends('layouts.main_layout')

@section('title', $product->name)

@section('content')

<<<<<<< HEAD
    <h2>{{$product->name}}</h2>
    <br/>
    <p>Description {{ $product->description }} </p>
    <br/>
    <strong>Precio {{ $product->price }}</strong>
    <br/>
    <small>Stock {{ $product->stock}} </small>
    <br/>
    @if ($category)
        <small>Category: {{ $category  }}</small>
    @endif
    <br/>
    <img src={{ "../../storage/product_pictures/" . $product->img_url }} alt="{{$product->name}}">

    <a href=" {{ route('addToCart', $product ) }} ">Agregar al carrito</a>
=======
    <div class="container row">
        <div class="col-12 col-sm-6 mt-5 mb-5">
            <img src={{ "../../storage/product_pictures/" . $product->img_url }} alt="{{$product->name}}">
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
>>>>>>> f414d7b3d287b78f2e9e6acc50e26cbd9d575367

@stop