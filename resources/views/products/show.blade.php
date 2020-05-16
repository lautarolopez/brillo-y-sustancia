@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

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

@stop