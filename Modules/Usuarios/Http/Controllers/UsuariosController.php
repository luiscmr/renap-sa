<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Usuarios\Entities\User;
use Modules\Usuarios\Http\Requests\UserStoreRequest;
use Modules\Usuarios\Http\Requests\UserUpdateRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios::usuarios.index')->with(compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::orderBy('name','asc');
        $permisos = Permission::orderBy('id','asc');
        return view('usuarios::usuarios.create')->with(compact('roles','permisos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        $usuario = User::create($request->except('_token','password_confirmation','id','rol','permisos'));
        $usuario->assignRole($request->rol);
        $usuario->givePermissionTo($request->permisos);
        return redirect()
            ->route('dashboard.usuarios.index')
            ->with('alert_success', 'El usuario ha sido creado.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(User $usuario)
    {
        return view('usuarios::usuarios.show')->with(compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(User $usuario)
    {
        $roles = Role::orderBy('name','asc');
        $permisos = Permission::orderBy('id','asc');
        return view('usuarios::usuarios.edit')->with(compact('usuario','roles','permisos'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UserUpdateRequest $request, User $usuario)
    {
        if (empty($request->password) ) {
            $data   = $request->except('_method','_token','id','password','password_confirmation','rol','permisos');
        } else {
            $data   = $request->except('_method','_token','id','password_confirmation','rol','permisos');
        }
        $usuario->update($data);
        $usuario->syncRoles($request->rol);
        $usuario->syncPermissions($request->permisos);
        return redirect()
            ->route('dashboard.usuarios.index')
            ->with('alert_success', 'El usuario ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()
            ->back()
            ->with('alert_success', 'El usuario ha sido eliminado.');
    }
}
