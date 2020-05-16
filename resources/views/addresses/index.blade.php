@extends('layouts.main_layout')

@section('title', 'Finalizar compra')

@section('content')
    <form action="{{route('completeSale')}}" method="post">
        @csrf
        @foreach ($addresses as $address)
            <input type="radio" id={{$address->id}} name="address" value={{ $address->id }}>
            <label for={{ $address->id }}> {{ $address->street }} </label>
        @endforeach
        <a class="btn" href={{ route('addresses.create', [$cart]) }}>Agregar una dirección nueva</a>
        @if ($cart)
            <button class="btn" type="submit">Continuar</button>    
        @endif
        
    </form>
@endsection
