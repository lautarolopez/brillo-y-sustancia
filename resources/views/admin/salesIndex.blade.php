@extends('layouts.admin_layout')
@section('title', 'Listado de ventas')
@section('content')

    <h2 class="title">Listado de ventas</h2>

    <ul class="items-list">
        @foreach ($salesInformation as $sale)
            <li class="sales">
                <span class="item-info">
                    <strong>Cliente:</strong>
                    <p>{{$sale['client']->name . ", " . $sale['client']->last_name}}</p>
                    <strong>Dirección:</strong>
                    <p>{{$sale['address']->street . ", " . $sale['address']->address_number}}
                        @if ($sale['address']->floor)
                            piso {{$sale['address']->floor}}<br>
                        @endif
                        @if ($sale['address']->departament)
                            depto. {{$sale['address']->departament}}<br>
                        @endif
                    </p>
                    <strong>Fecha de compra:</strong>
                    <p>{{$sale['sale']->purchase_date}}</p>
                    <strong>Productos:</strong>
                    <p class="enum-paragraph">
                        @foreach ($sale['products'] as $product)
                            {{$product->name}} ${{$product->price}} x{{$product->pivot->quantity}}<br>
                        @endforeach
                    </p>
                    <strong>Total:</strong>
                    <p>${{collect($sale['products'])->reduce(function ($total, $prod) {
                        return $total + ($prod->price * $prod->pivot->quantity); 
                    })}}</p>
                    @if ($sale['sale']->shipped)
                        <i class="fas fa-shipping-fast"></i>
                        @if ($sale['sale']->completed)
                            <i class="far fa-check-circle"></i>
                        @else
                            <form class="single-button-form" action="{{route('sales.setCompleted', $sale['sale'])}}" method="post">
                                @csrf @method('PATCH')
                                <button class="btn">Marcar como completado</button>
                            </form>
                        @endif
                    @else
                        <form class="single-button-form" action="{{route('sales.setShipped', $sale['sale'])}}" method="post">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn">Marcar como enviado</button>
                        </form>
                    @endif
                </span>
            </li>
        @endforeach
    </ul>
    
    
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




@endsection