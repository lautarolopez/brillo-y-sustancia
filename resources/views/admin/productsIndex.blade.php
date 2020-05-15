@extends('layouts.admin_layout')

@section('content')

<form action="{{route('admin-products.create')}}" method="get">
    <button class="btn" >Agregar producto</button>
</form>

    @foreach ($products as $product)
        <h3>Nombre: {{$product->name}}</h3>
        <h3>Precio: ${{$product->price}}</h3>
        <h3>Stock: {{$product->stock}}</h3>
        <a href="{{ route('admin-products.edit', $product)}} ">Editar</a>    
        <form method="post" action="{{ route('admin-products.destroy', $product) }}">
            @csrf @method('DELETE')
            <button>Eliminar</button>
        </form>
        <hr>
    @endforeach




@endsection