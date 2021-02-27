@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Inventario</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-success" href="{{ route('inventory.create') }}">Agregar</a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Operación</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $index => $item)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->operation->operation }}</td>
                    <td class="d-inline-block">
                        <a class="btn btn-sm btn-warning" href="{{ route('inventory.edit', $item->id ) }}">Ajustar</a>                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $results->links() }}
    </div>
@endsection

