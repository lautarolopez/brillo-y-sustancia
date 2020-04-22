@extends('layouts.main_layout')

@section('title', 'Home')

@section('content')
    <div class="form-container">
        <div class="login">
            <div class="login-form">
                <h1 class="title">Registro</h1>
                <form method="POST">
                    @csrf
                    <div class="input-form">
                        <label class="text-little" for="name">Nombre</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="input-form">
                        <label class="text-little" for="lastname">Apellido</label>
                        <input type="text" name="lastname" id="lastname">
                    </div>
                    <div class="input-form">
                        <label class="text-little" for="email">Email</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="input-form">
                        <label class="text-little" for="password">Contraseña</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn">Registrarte</button>
                    <p class="text-little help-account">Ya tenes una cuenta? <a href="login.php" class="text-little">Iniciar sesion</a></p>
                </form>
            </div>
        </div>
    </div>
@stop