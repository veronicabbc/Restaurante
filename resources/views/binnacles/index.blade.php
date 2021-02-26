@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Bitacora</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        
        </div>
    </div>
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">IP</th>
                <th scope="col">Fecha</th>
                <th scope="col">Usuario Ejecutor</th>
                <th scope="col">Datos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $index => $item)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $item->ip }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->user->username }}</td>                    
                    <td>{{ $item->accion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $results->links() }}
    </div>
@endsection

