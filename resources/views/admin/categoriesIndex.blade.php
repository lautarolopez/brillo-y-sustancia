@extends('layouts.admin_layout')

@section('content')

<form action="{{route('categories.create')}}" method="get">
    <button class="btn" >Agregar categoría</button>
</form>


    @foreach ($categories as $category)
        <h3>{{$category->name}}</h3>
        <form method="post" action="{{ route('categories.destroy', $category) }}">
            @csrf @method('DELETE')
            <button>Eliminar esta categoría</button>
        </form><hr>
    @endforeach

@endsection