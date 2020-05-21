@extends('layouts.main_layout')

@section('content')
    <form class="passwords-form" method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <h2>Confirmá tu contraseña</h2>

            @error('password')
                <small>{{ $message }}</small>
            @enderror
            <input id="password" type="password" name="password" placeholder="Contraseña" class="@error('password') is-invalid @enderror" required autocomplete="current-password">

            <button type="submit" class="btn">
                Enviar
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Olvidaste tu contraseña?
                </a>
            @endif
    </form>
@endsection
