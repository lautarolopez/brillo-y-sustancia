@extends('layouts.admin_layout')

@section('content')


    <form class="passwords-form" action="{{route('categories.store')}}" method="post">
        @csrf
        <h2>Agregar una nueva categoría</h2>
        
        <input type="text" placeholder="Nombre" name="name" value="{{ old('name', $category->name) }}">
        <button type="submit">Guardar</button>
    </form>

@endsection