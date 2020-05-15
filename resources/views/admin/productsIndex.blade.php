@extends('layouts.admin_layout')

@section('content')




    @foreach ($products as $product)
        <h3>Nombre: {{$product->name}}</h3>
        <h3>Precio: ${{$product->price}}</h3>
        <h3>Stock: {{$product->stock}}</h3>
        <hr>
    @endforeach




@endsection