@extends('layouts.main_layout')

@section('title', 'Ingresá')

@section('content')
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf

        <h2>Ingresá</h2>

        <input id="email" type="email"  name="email" placeholder="Correo electrónico"{{-- class="@error('email') is-invalid @enderror" --}} value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password" type="password" name="password" placeholder="Contraseña" {{-- class="@error('password') is-invalid @enderror" --}} required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <button type="submit" class="btn">
            Ingresá
        </button>

        <span class="spancito">
            <label for="remember">
                Permanecer conectado
            </label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        </span>
         
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                Olvidaste tu contraseña?
            </a>
        @endif
    </form>
@endsection
