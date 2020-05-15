@extends('layouts.admin_layout')

@section('content')




    @foreach ($users as $user)
        <h3>{{$user->last_name . ", " . $user->name}}</h3>
        <form action="{{route('users.changePermissions', $user)}}" method="post">
            @csrf @method('PATCH')
            @if ($user->isAdmin)
                <button type="submit" class="btn">Quitar permisos de administrador</button>
            @else
                <button type="submit" class="btn">Hacer admnistrador</button>
            @endif
        </form>
        <hr>
    @endforeach




@endsection