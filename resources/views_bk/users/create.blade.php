@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Crear Usuario</h1>
    </div>
    <form method='post' action='{{ route('users.store') }}'>
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Usuario</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                placeholder="Ingrese los nombres de usuario">
            <small id="name" class="form-text text-muted">Ingrese los nombres del usuario.</small>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="username">Nombre de Usuario</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username"
                placeholder="Ingrese un nombre de usuario">
            <small id="emailHelp" class="form-text text-muted">Ingrese el usuario.</small>
            @error('username') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <small id="password" class="form-text text-muted">Ingrese la contraseña</small>
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select class="form-control" id="role" name="role_id">
                <option value="">Seleccione</option>
                @foreach ($roles as $item)
                    <option value="{{ $item->id }}">{{ $item->role}}</option>
                @endforeach
            </select>
            @error('role_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href='{{ route('users.index') }}' class="btn btn-warning">Volver</a>
    </form>
@endsection
