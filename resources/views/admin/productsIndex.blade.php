@extends('layouts.admin_layout')
@section('title', 'Listado de productos')
@section('content')

<h2 class="title">Listado de productos</h2>

<form class="single-button-form" action="{{route('admin-products.create')}}" method="get">
    <button class="btn" >Agregar producto</button>
</form>

    <ul class="items-list">
        @foreach($products as $product)
            <li>
                <span class="item-info">
                    <img src={{ "../../storage/product_pictures/" . $product->img_url }} alt="{{$product->name}}">
                    <span>
                        <strong>Nombre:</strong>
                        <p style="text-transform: capitalize">{{$product->name}}</p>
                        <strong>Precio:</strong>
                        <p>${{$product->price}}</p>
                        <strong>Stock:</strong>
                        <p>{{$product->stock}}</p>
                        <strong>Categoría</strong>
                        @if ($product->category)
                            <p style="text-transform: capitalize">{{$product->category->name}}</p>
                        @else
                            <p>No tiene</p>
                        @endif
                        <strong>Descripción</strong>
                        <p class="description-paragraph">{{$product->description}}</p>
                    </span>
                </span>
                <a style="margin-bottom: 30px"class="btn" href="{{ route('admin-products.edit', $product)}} ">Editar</a>    
                <form method="post" action="{{ route('admin-products.destroy', $product) }}">
                    @csrf @method('DELETE')
                    <button style="width: 100%" class="btn">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>


@endsection