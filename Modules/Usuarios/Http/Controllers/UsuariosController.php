<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Usuarios\Entities\Persona;
use Modules\Usuarios\Http\Requests\UserStoreRequest;
use Modules\Usuarios\Http\Requests\UserUpdateRequest;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $usuarios = Persona::all();
        return view('usuarios::usuarios.index')->with(compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('usuarios::usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        $usuario = Persona::create($request->except('_token','password_confirmation','id'));
        return redirect()
            ->route('dashboard.usuarios.show',$usuario->id)
            ->with('alert_success', 'El usuario ha sido creado.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Persona $usuario)
    {
        return view('usuarios::usuarios.show')->with(compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Persona $usuario)
    {
        return view('usuarios::usuarios.edit')->with(compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UserUpdateRequest $request, Persona $usuario)
    {
        if (empty($request->password) ) {
            $data   = $request->except('_method','_token','id','password','password_confirmation');
        } else {
            $data   = $request->except('_method','_token','id','password_confirmation');
        }
        $usuario->update($data);
        return redirect()
            ->route('dashboard.usuarios.show',$usuario->id)
            ->with('alert_success', 'El usuario ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Persona $usuario)
    {
        $usuario->delete();

        return redirect()
            ->back()
            ->with('alert_success', 'El usuario ha sido eliminado.');
    }
}
