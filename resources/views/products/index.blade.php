@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

  <ul>
      @forelse ($products as $product)
        <li>{{ $product->name }} <br> <small> {{ $product->description }}</small></li>
        <a href="{{route('products.show', $product)}}"><img src= {{"../storage/" . $product->img_url }} alt= {{ $product->name }}}></a>
      @empty
        <p>No hay nada para mostrar</p>
      @endforelse
  </ul>    

@stop