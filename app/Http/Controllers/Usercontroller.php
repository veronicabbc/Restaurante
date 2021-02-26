<?php

namespace App\Http\Controllers;

use App\Binnacle;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::where('id', '!=', auth()->user()->id)->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //dd( $request->all());
        $user = User::create(
            $request->only('name', 'username', 'password', 'role_id')
        );

        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$user,
            'user_id'=>auth()->user()->id
        ]);

        // session()->flash('message', 'Usuario '.$request->user.' Guardado Exitosamente');

        return redirect()
        ->route('users.edit',$user->id)
        ->with('info', 'registro creado con exito');
        // return redirect()->route('users.index');// donde esta es rout?
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show', [
            'user' => User::find($id),
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit', [
            'user' => User::find($id),
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill(
            $request->only('name', 'username', 'role_id')
        );
        $user->save();
       
        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$user,
            'user_id'=>auth()->user()->id
        ]);

        session()->flash('message', 'Actualizado Exitosamente');        

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $user = User::find($id);
        $user->delete();
        
        Binnacle::create([
            'ip' => request()->ip(),
            'date'=> now(),
            'accion'=>$user,
            'user_id'=>auth()->user()->id
        ]);

        session()->flash('message', 'Eliminado Exitosamente');
        return redirect()->route('users.index');
    }
}
