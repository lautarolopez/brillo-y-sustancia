@extends('layouts.admin_layout')

@section('title', 'Home')

@section('content')

<form class="passwords-form" method="POST" action="{{ route('admin-products.update', $product)}}" enctype="multipart/form-data">
    @method('PATCH')
    <h2>Editar producto</h2>    
    @include('products._form', [ 'btnText' => 'Actualizar' ])

</form>



@stop