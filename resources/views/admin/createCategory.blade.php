@extends('layouts.admin_layout')

@section('content')


    <form class="passwords-form" action="{{route('categories.store')}}" method="post">
        @csrf
        <h2>Agregar una nueva categoría</h2>

        @error('name')
            <small>{{$message}}</small>
        @enderror
        <input type="text" placeholder="Nombre" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}">
        
        <button type="submit">Guardar</button>
    </form>

@endsection