@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Ver Usuario: {{ $product->product }}</h1>
    </div>
    <div class="form-group">
        <label for="product">Nombre del producto</label>
        <input type="text" class="form-control" id="product" name="product" aria-describedby="product"
            placeholder="Ingrese el nombre del producto" disabled="disabled" value="{{ $product->name }}">
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <input type="text" class="form-control" id="description" name="description" aria-describedby="description"
            placeholder="Ingrese una breve descripción del producto" disabled="disabled"
            value="{{ $product->description }}">
    </div>
    <div class="form-group">
        <label for="amount">Monto</label>
        <input type="number" class="form-control" id="amount" name="amount" aria-describedby="amount"
            placeholder="Ingrese el monto" disabled="disabled" value="{{ $product->amount }}">
    </div>
    <a href='{{ route('products.index') }}' class="btn btn-warning">Volver</a>
    </form>
@endsection
