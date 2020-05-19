@extends('layouts.main_layout')

@section('title', 'Nueva dirección')

@section('content')

    <form class="passwords-form" method="POST" action="{{ route('addresses.store')}}">
        @csrf
        <h2>Nueva dirección</h2>

        @error('street')
            <small>{{ $message }}</small>
        @enderror
        <input type="text" name= "street" id="street" class="@error('street') is-invalid @enderror"placeholder="Calle" required>
        
        @error('address_number')
            <small>{{ $message }}</small>
        @enderror
        <input type="number" name= "address_number" id="address_number" class="@error('address_number') is-invalid @enderror"placeholder="Número" required>
        
        @error('floor')
            <small>{{ $message }}</small>
        @enderror
        <input type="text" name= "floor" id="floor" class="@error('floor') is-invalid @enderror"placeholder="Piso" >
        
        @error('departament')
            <small>{{ $message }}</small>
        @enderror
        <input type="text" name= "departament" id="departament" class="@error('departament') is-invalid @enderror"placeholder="departamento" >
        
        <input type="hidden" name="cart" value={{$cart}}>
        
        
        <button type="submit" class="btn">Guardar</button>
    </form>

@stop