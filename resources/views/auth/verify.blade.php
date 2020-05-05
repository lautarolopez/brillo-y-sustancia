@extends('layouts.main_layout')

@section('title', 'Verificá tu correo')

@section('content')
    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <form class="passwords-form" method="POST" action="{{ route('verification.resend') }}">
        @csrf

        <h2>Verificá tu correo electrónico</h2>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                Se envió un link de verificación a tu correo electrónico.
            </div>
        @endif
        <button type="submit" class="btn">Enviar otro</button>
    </form>
@endsection
