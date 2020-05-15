@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

@include('partials.validation-errors')

<h1>Editar producto</h1>
<form method="POST" action="{{ route('products.update', $product)}}" enctype="multipart/form-data">
    @method('PATCH')
    
    @include('products._form', [ 'btnText' => 'Actualizar' ])

</form>



@stop