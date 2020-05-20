@extends('layouts.admin_layout')

@section('title', 'Home')

@section('content')


<form class="passwords-form" method="POST" action="{{ route('admin-products.store')}}" enctype="multipart/form-data">
    <h2>Cargar nuevo producto</h2>
    @include('products._form', [ 'btnText' => 'Guardar' ])
    
</form>



@stop