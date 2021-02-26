<?php

namespace App\Http\Controllers;

use App\Product;
use App\Binnacle;
use App\Inventory;
use App\OperationType;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.index', [
            'results' => Inventory::orderby('updated_at', 'desc')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create', [
            'operations' => OperationType::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory = Inventory::create(
            $request->only('quantity', 'operation_type_id', 'product_id')
        );
        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$inventory,
            'user_id'=>auth()->user()->id
        ]);
        
        session()->flash('message', 'Guardado Exitosamente');

        return redirect()->route('inventory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('inventory.show', [
            'inventory' => $inventory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', [
            'inventory' => $inventory,
            'operations' => OperationType::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $inventory->fill(
            $request->only('quantity', 'operation_type_id', 'product_id')
        )->save();

        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$inventory,
            'user_id'=>auth()->user()->id
        ]);
        
        session()->flash('message', 'Actualizado Exitosamente');

        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$inventory,
            'user_id'=>auth()->user()->id
        ]);
        
        session()->flash('message', 'Eliminado Exitosamente');
        return redirect()->route('inventory.index');
    }
}
