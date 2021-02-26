@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Crear producto</h1>
    </div>
    <form method='post' action='{{ route('products.store') }}'>
        @csrf
        <div class="form-group">
            <label for="product">Nombre del producto</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="product"
                placeholder="Ingrese el nombre del producto">
            <small id="product" class="form-text text-muted">Ingrese el nombre del producto.</small>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" id="description" name="description" aria-describedby="description"
                placeholder="Ingrese una breve descripción del producto">
            <small id="description" class="form-text text-muted">Ingrese una breve descripción del producto.</small>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>        
        <div class="form-group">
            <label for="amount">Monto</label>
            <input type="number" class="form-control" id="amount" name="amount" aria-describedby="amount"
                placeholder="Ingrese el monto">
            <small id="amount" class="form-text text-muted">Ingrese el monto.</small>
            @error('amount') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href='{{ route('products.index') }}' class="btn btn-warning">Volver</a>
    </form>
@endsection
