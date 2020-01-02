<?php

namespace Modules\Autenticacion\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AutenticacionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $user2 = Persona::leftJoin('Gestion as g1','Persona.dpi','g1.dpimujer')
                        ->where('genero','F')
                        ->where('difunto',0)
                        ->where('estadocivil','C')
                        ->whereNotNull('dpi')
                        ->whereRaw('fecha_nacimiento < (now() - INTERVAL 18 YEAR)')
                        ->whereNull('g1.dpimujer')
                        ->toSql();
        return view('autenticacion::index')->with(compact('user2'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('autenticacion::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('autenticacion::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('autenticacion::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
