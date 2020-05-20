@extends('layouts.admin_layout')
@section('title', 'Categorías')
@section('content')

<h2 class="title">Categorías</h2>

<form class="single-button-form" action="{{route('categories.create')}}" method="get">
    <button class="btn index-action" >Nueva categoría</button>
</form>

    <ul class="items-list">
        @foreach ($categories as $category)
            <li class="categories-li">
                <span class="items-info">
                    <strong>Nombre: </strong>
                    <p style="text-transform: capitalize">{{$category->name}}</p>
                    <strong>Cantidad de productos:</strong>
                    <p>{{$category->products->count()}}</p>
                </span>
                <form method="post" action="{{ route('categories.destroy', $category) }}">
                    @csrf @method('DELETE')
                    <button class="btn">Eliminar esta categoría</button>
                </form>
            </li>
        @endforeach
    </ul>

@endsection