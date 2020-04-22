@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')
    <div class="form-container">
        <div class="login">
            <div class="login-form">
                <h1 class="title">Iniciar sesión</h1>
                <form method="POST">
                    @csrf
                    <div class="input-form">
                        <label class="text-little" for="email">Email</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="input-form">
                        <label class="text-little" for="pass">Contraseña</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <label for="rememberUser">Permanecer conectado</label>
                    <input type="checkbox" name="rememberUser" id="rememberUser">
                    <a href="passRecover.php" class="text-little question-form">Olvidaste tu contraseña?</a>
                    <button type="submit" class="btn">Entrar</button>
                    <p class="text-little help-account">No tiene una cuenta? <a href="register.php" class="text-little">Registrase</a></p>
                </form>
            </div>
        </div>
    </div>
@stop