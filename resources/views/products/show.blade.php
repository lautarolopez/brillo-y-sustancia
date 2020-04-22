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
<small>Category: {{ $category }}</small>
<br/>
<img src={{ "../storage/" . $product->img_url }} alt="{{$product->name}}">

<a href=" {{ route('products.edit', $product)}} ">Editar</a>
<form method="post" action="{{ route('products.destroy', $product) }}">
  @csrf @method('DELETE')
  <button>Eliminar</button>
</form>
<a href=" {{ route('addToCart', $product ) }} ">Agregar al carrito</a>

@stop