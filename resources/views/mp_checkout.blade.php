@extends('layouts.main_layout')

@section('title', 'Procesar pago')

@section('content')
    <h2 class="title">Procesar pago</h2>
    <div class="mp-logo-container">
        <img class="mp-logo" src="https://logodownload.org/wp-content/uploads/2019/06/mercado-pago-logo-3.png" alt="mercado-pago-loco">
    </div>
    <form class="single-button-form" action="procesar-pago" method="post">
        @csrf
        <script
        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" 
        data-preference-id={{$preference->id}}>
        </script>
    </form>
@endsection