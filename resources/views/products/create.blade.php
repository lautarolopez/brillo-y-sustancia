@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

@include('partials.validation-errors')

<h1>Crear producto</h1>
<form method="POST" action="{{ route('products.store')}}" enctype="multipart/form-data">

    @include('products._form', [ 'btnText' => 'Guardar' ])
    
</form>



@stop