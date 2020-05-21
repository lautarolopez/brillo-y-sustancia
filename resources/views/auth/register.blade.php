@extends('layouts.main_layout')

@section('title', 'Registrate')

@section('content')
    <form class="register-form" method="POST" action="{{ route('register') }}">
        @csrf
        <h2>Registrate</h2> 

        @error('name')
            <small>{{ $message }}</small>
        @enderror
        <input id="name" type="text" name="name" placeholder="Nombre" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('last_name')
            <small>{{ $message }}</small>
        @enderror
        <input id="last_name" type="text"  name="last_name" placeholder="Apellido"  class="@error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

        @error('email')
            <small>{{ $message }}</small>
        @enderror
        <input id="email" type="email" name="email" placeholder="Correo electrónico" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">

        @error('password')
            <small>{{ $message }}</small>
        @enderror
        <input id="password" type="password" name="password" placeholder="Contraseña" class="@error('password') is-invalid @enderror" required autocomplete="new-password">

        <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirmá tu contraseña" required autocomplete="new-password">
        
        <button type="submit" class="btn">
            Registrate
        </button>
    </form>
@endsection
