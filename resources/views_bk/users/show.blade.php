@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Ver Usuario: {{ $user->username }}</h1>
    </div>
    <div class="form-group">
        <label for="name">Nombre del Usuario</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
            placeholder="Ingrese los nombres de usuario" disabled="disabled" value=" {{ $user->name }}">
    </div>
    <div class="form-group">
        <label for="username">Nombre de Usuario</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="username"
            placeholder="Ingrese un nombre de usuario" disabled="disabled" value=" {{ $user->username }}">
    </div>
    <div class="form-group">
        <label for="role">Rol</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="username"
            placeholder="Ingrese un nombre de usuario" disabled="disabled" value="{{ $user->role->role }}">
    </div>
    <a href='{{ route('users.index') }}' class="btn btn-warning">Volver</a>
    </form>
@endsection
