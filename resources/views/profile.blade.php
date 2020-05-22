@extends('layouts.main_layout')

@section('title', 'Perfil')

@section('content')

@auth
    <div class="hero-profile">
        <div class="hero-filter"></div>
        <div class="img-profile">
            <img src="/storage/user_profile_pictures/{{ $user->profile_img_url }}" alt="{{$user->profile_img_url}}">
        </div>
        <h2>{{ $user->name . " " . $user->last_name}}</h2>
    </div>

    <div class="row container mt-5 mb-5">
        <div class="col-12 col-md-4 mb-5">
            <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action list-group-item-dark active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
            <a class="list-group-item list-group-item-action list-group-item-dark" id="list-editar-list" data-toggle="list" href="#list-editar" role="tab" aria-controls="editar">Editar perfil</a>
            <a class="list-group-item list-group-item-action list-group-item-dark" id="list-direcciones-list" data-toggle="list" href="#list-direcciones" role="tab" aria-controls="direcciones">Direcciones</a>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
            <div class="tab-pane fade" id="list-editar" role="tabpanel" aria-labelledby="list-editar-list">
                <form  method="POST" action="{{ route('editarPerfil') }}" class="edit-profile" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$user->id}}" style="display:none">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input type="text" class="form-control" id="lastname" name="last_name" value="{{$user->last_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_img">Foto de perfil</label>
                        <input type="file" class="form-control" id="profile_img" name="profile_img"> <!--value="{{$user->profile_img_url}}"-->
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="password-container">
                            <input type="password" class="form-control" id="password" name="password">
                            <span id="show_password" class="fa fa-fw fa-eye field-icon"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn radius-none btn-primary mb-2">Guardar cambios</button>
                </form>
            </div>
            <div class="tab-pane fade" id="list-direcciones" role="tabpanel" aria-labelledby="list-direcciones-list">
                @include('addresses.index_without_layout', [
                    'cart' => false,
                    'addresses' => $addresses
                ]);
            </div>
        </div>
    </div>
@endauth

@stop