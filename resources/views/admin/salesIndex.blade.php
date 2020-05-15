@extends('layouts.admin_layout')

@section('content')

    @foreach ($salesInformation as $sale)
        <h3>ID: "{{$sale['sale']->id}}"</h3>
        <h3>Purchase Date: "{{$sale['sale']->purchase_date}}"</h3>
        @if ($sale['sale']->shipped)
            <h3>Shipped!</h3>
            @if ($sale['sale']->completed)
                <h3>Completed!</h3>
            @else
                <form action="{{route('sales.setCompleted', $sale['sale'])}}" method="post">
                    @csrf @method('PATCH')
                    <button class="btn">Marcar como completado</button>
                </form>
            @endif
        @else
            <form action="{{route('sales.setShipped', $sale['sale'])}}" method="post">
                @csrf @method('PATCH')
                <button type="submit" class="btn">Marcar como enviado</button>
            </form>
        @endif
        <div style="border:1px solid red">
            <ul>
                @foreach ($sale['products'] as $product)
                    <li style="background-color: purple">{{$product->name}}</li>
                @endforeach
            </ul>
        </div>
        <hr>
    @endforeach




@endsection