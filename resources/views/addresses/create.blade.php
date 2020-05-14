@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')

    @include('partials.validation-errors')

    <form class="passwords-form" method="POST" action="{{ route('addresses.store')}}">
        @csrf
        <h2>Nueva dirección</h2>

        <input type="text" name= "street" id="street" placeholder="Calle" required>
        <input type="number" name= "address_number" id="address_number" placeholder="Número" required>
        <input type="text" name= "floor" id="floor" placeholder="Piso" >
        <input type="text" name= "departament" id="departament" placeholder="departamento" >
        <input type="hidden" name="cart" value={{$cart}}>
        <button type="submit" class="btn">Guardar</button>
    </form>



@stop