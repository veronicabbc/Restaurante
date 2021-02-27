@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Inventario: {{ $inventory->product->name }} </h1>
    </div>

    <form method='POST' action="{{ route('inventory.update', $inventory->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="product">Nombre del producto</label>
            <select class="form-control" id="product_id" name="product_id">
                <option value="">Seleccione</option>
                @foreach ($products as $item)
                    <option value="{{ $item->id }}" @if ($inventory->product->id == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('product_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="product">Tipo de Operación</label>
            <select class="form-control" id="operation_type_id" name="operation_type_id">
                <option value="">Seleccione</option>
                @foreach ($operations as $item)
                    <option value="{{ $item->id }}" @if ($inventory->operation->id == $item->id) selected @endif>{{ $item->operation }}</option>
                @endforeach
            </select>
            @error('operation_type_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" id="quantity" name="quantity" aria-describedby="quantity"
                placeholder="Cantidad" value="{{ $inventory->quantity }}">
            <small id="quantity" class="form-text text-muted">Ingrese el monto.</small>
            @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href='{{ route('products.index') }}' class="btn btn-warning">Volver</a>
    </form>
@endsection
