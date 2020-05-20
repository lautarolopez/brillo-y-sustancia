@extends('layouts.admin_layout')
@section('title', 'Usuarios registrados')
@section('content')


    <h2 class="title">Usuarios registrados</h2>
    <ul class="items-list">
        @foreach ($users as $user)
            <li>
                <span class="item-info">
                    <img src="/storage/user_profile_pictures/{{$user->profile_img_url}}" alt="{{$user->profile_img_url}}">
                    <span>
                        <strong>Nombre:</strong>
                        <p>{{$user->last_name . ", " . $user->name}}</p>
                        <strong>Email:</strong> 
                        <p>{{$user->email}}</p>
                    </span>
                </span>
                <form action="{{route('users.changePermissions', $user)}}" method="post">
                    @csrf @method('PATCH')
                    @if ($user->isAdmin)
                        <button type="submit" class="btn">Quitar permisos de administrador</button>
                    @else
                        <button type="submit" class="btn">Hacer admnistrador</button>
                    @endif
                </form>
            </li>
        @endforeach
    </ul>



@endsection