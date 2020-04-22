@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

    @forelse ($products as $product)
        {{ $product->name }}
        <form method="post" action="{{ route('deleteFromCart', $product->url) }}">
            @csrf @method('DELETE')
            <button>Eliminar del carrite</button>
        </form>
    @empty
        <h6> No hay nada para mostrar flacucho </h6>
    @endforelse
@stop