@extends('layouts.main_layout')

@section('title', 'Reiniciá tu contraseña')

@section('content')
    <form class="passwords-form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <h2>Reiniciá tu contraseña</h2>

        @error('email')
            <small>{{ $message }}</small>
        @enderror
        <input id="email" type="email" name="email" placeholder="Correo electrónico" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

        <button type="submit" class="btn">
            Enviar link
        </button>
    </form>
@endsection
