<?php

namespace App\Http\Controllers;

use App\Product;
use App\Binnacle;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'results' => Product::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create(
            $request->only('name','description','amount')
        );
        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$product,
            'user_id'=>auth()->user()->id
        ]);
        session()->flash('message', 'Guardado Exitosamente');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {        
        $product->fill(
            $request->only('name','description','amount')
        );
        $product->save();
        
        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$product,
            'user_id'=>auth()->user()->id
        ]);
        session()->flash('message', 'Actualizado Exitosamente');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$product,
            'user_id'=>auth()->user()->id
        ]);
        session()->flash('message', 'Eliminado Exitosamente');
        return redirect()->route('products.index');
    }
}
