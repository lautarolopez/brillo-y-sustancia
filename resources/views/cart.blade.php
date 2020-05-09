@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

    @forelse ($products as $product)
        {{ $product->name }}
        <form method="post" action="{{ route('deleteFromCart', $product->url) }}">
            @csrf @method('DELETE')
            <button class="btn" type="submit">Eliminar del carrite</button>
        </form>
    @empty
        <h6> No hay nada para mostrar flacucho </h6>
    @endforelse
    @if ($products->isNotEmpty())
        <form method="post" action="{{ route('checkOutCart') }}">
            @csrf
            <button class="btn" type="submit">Completar la compra</button>
        </form>    
    @endif
    
@stop