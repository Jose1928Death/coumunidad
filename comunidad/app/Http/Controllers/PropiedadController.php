<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedads=Propiedad::orderBy('nombre')->paginate(5);
        return view('propiedads.index', compact('propiedads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propiedads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required'],
            'piso' => 'required|integer|between:1,10'
        ]);
        $propiedad = new Propiedad();
        $propiedad->nombre = ucwords($request->nombre);
        $propiedad->piso = ucwords($request->piso);

        $propiedad->save();
        return redirect()->route('Propiedad.index')->with('mensaje', "Vecino guardado.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedad $propiedad)
    {
        return view("propiedads.edit", compact("propiedad"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propiedad $propiedad)
    {
        $request->validate([
            'nombre' => ['required'],
            'piso' => 'required|integer|between:1,10'
        ]);
        $propiedad->update([
            'nombre' => ucwords($request->nombre),
            'piso' => ucwords($request->piso)
        ]);

        return redirect()->route('Propiedad.index')->with('mensaje', "Alumno actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedad $propiedad)
    {
        $propiedad->delete();
        return redirect()->route('Propiedad.index')->with("mensaje", "Propiedad Borrada correctamente.");
    }
}
