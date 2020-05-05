@extends('layouts.main_layout')

@section('title', 'Reiniciá tu contraseña')

@section('content')
    <form class="passwords-form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <h2>Reiniciá tu contraseña</h2>

        <input id="email" type="email" name="email" placeholder="Correo electrónico" {{-- class="@error('email') is-invalid @enderror" --}} value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <button type="submit" class="btn">
            Enviar link
        </button>
    </form>
@endsection
