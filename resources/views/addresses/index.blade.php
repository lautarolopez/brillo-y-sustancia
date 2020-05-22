@extends('layouts.main_layout')

@section('title', 'Finalizar compra')

@section('content')

    @if ($cart)
        <h2 class="title">Elegir dirección</h2>
    @else
        <h2 class="title">Mis direcciones</h2>
    @endif
    <form class="addresses-form" action="{{route('redirectToMercadoPago')}}" method="post">
        @csrf
        @foreach ($addresses as $address)
            <div class="address-container">
                @if ($cart)
                    <input type="radio" id={{$address->id}} name="address" value={{ $address->id }}> 
                    <label for={{ $address->id }}> 
                        <p style="margin: 0">Dirección: {{ $address->street }}, {{$address->address_number}}</p>
                        @if ($address->floor)
                            <p style="margin: 0">Piso: {{$address->floor}}</p>
                        @endif
                        @if ($address->street)
                            <p style="margin: 0">Departamento: {{$address->departament}}</p>
                        @endif
                    </label>                    
                @else
                    <span>
                        <p style="margin: 0">Dirección: {{ $address->street }}, {{$address->address_number}}</p>
                        @if ($address->floor)
                            <p style="margin: 0">Piso: {{$address->floor}}</p>
                        @endif
                        @if ($address->street)
                            <p style="margin: 0">Departamento: {{$address->departament}}</p>
                        @endif
                        <hr>
                    </span>
                @endif

            </div>
        @endforeach
        <span class="alert"></span>
        <a class="btn" style="margin-bottom: 30px" href={{ route('addresses.create', [$cart]) }}>Agregar una dirección nueva</a>
        @if ($cart)
            <button class="btn" style="margin-bottom: 30px" type="submit">Continuar</button>    
        @endif        
    </form>

<script>
    let formAddresses = document.querySelector('form.addresses-form'); 
    formAddresses.addEventListener('submit', (e) => {
        e.preventDefault();
        let radios = document.querySelectorAll('input[type=radio]:checked')
        if(radios.length === 0){
            alertElement = document.createElement('small');
            alertElement.innerHTML = "Tenés que elegir una dirección!";
            alertElement.style.color = "red";
            document.querySelector('span.alert').appendChild(alertElement);
        } else {
            formAddresses.submit();
        }
    })
</script>
@endsection

