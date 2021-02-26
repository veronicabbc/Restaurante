@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuarios</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-success" href="{{ route('users.create') }}">Agregar</a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Rol</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->role->role }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $item->id ) }}">Editar</a>
                        <form action="{{ route('users.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                          </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
