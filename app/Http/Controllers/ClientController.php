<?php

namespace App\Http\Controllers;

use App\Client;
use App\Binnacle;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index', [
            'results' => Client::paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::create(
            $request->only('quantity', 'operation_type_id', 'product_id')
        );
        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$client,
            'user_id'=>auth()->user()->id
        ]);
        session()->flash('message', 'Guardado Exitosamente');

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->fill(
            $request->only('quantity', 'operation_type_id', 'product_id')
        )->save();

        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$client,
            'user_id'=>auth()->user()->id
        ]);
        

        session()->flash('message', 'Actualizado Exitosamente');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$client,
            'user_id'=>auth()->user()->id
        ]);
        
        session()->flash('message', 'Eliminado Exitosamente');
        return redirect()->route('products.index');
    }
}
