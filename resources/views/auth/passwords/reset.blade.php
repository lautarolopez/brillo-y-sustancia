@extends('layouts.main_layout')

@section('title', 'Cambiá tu contraseña')

@section('content')
    <form class="passwords-form" method="POST" action="{{ route('password.update') }}">
        @csrf

        <h2>Cambiá tu contraseña</h2>

        <input type="hidden" name="token" value="{{ $token }}">

        @error('email')
            <small>{{ $message }}</small>
        @enderror
        <input id="email" type="email" name="email" placeholder="Correo electrónico" class="@error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

        @error('password')
            <small>{{ $message }}</small>
        @enderror
        <input id="password" type="password" name="password" placeholder="Contraseña" class="@error('password') is-invalid @enderror" required autocomplete="new-password">

        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

        <button type="submit" class="btn">
            Cambiá tu contraseña
        </button>
    </form>
@endsection
