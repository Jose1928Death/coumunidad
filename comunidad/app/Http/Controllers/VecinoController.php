<?php

namespace App\Http\Controllers;

use App\Models\Vecino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class VecinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vecinos=Vecino::orderBy('nombre')->paginate(5);
        return view('vecinos.index', compact('vecinos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vecinos.create');
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
            'apellidos' => ['required'],
            'email' => 'required|email|unique:users,email'
        ]);
        $vecino = new Vecino();
        $vecino->nombre = ucwords($request->nombre);
        $vecino->apellidos = ucwords($request->apellidos);
        $vecino->email = ucwords($request->email);

        if ($request->has('foto')) {
            $request->validate([
                'foto' => ['image']
            ]);
            $file = $request->file('foto');
            $nombre = "img/vecinos/" . uniqid() . "_" . $file->getClientOriginalName();
            Storage::Disk("public")->put($nombre, \File::get($file));

            $vecino->foto = "storage/" . $nombre;
        }
        $vecino->save();
        return redirect()->route('vecino.index')->with('mensaje', "Vecino guardado.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vecino  $vecino
     * @return \Illuminate\Http\Response
     */
    public function show(Vecino $vecino)
    {
        return view('vecinos.info', compact('vecino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vecino  $vecino
     * @return \Illuminate\Http\Response
     */
    public function edit(Vecino $vecino)
    {
        return view('vecinos.edit', compact('vecino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vecino  $vecino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vecino $vecino)
    {
        $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
            'email' => 'required|email|unique:users,email'
        ]);
        $vecino->update([
            'nombre' => ucwords($request->nombre),
            'apellidos' => ucwords($request->apellidos),
            'email' => ucwords($request->email)
        ]);

        if ($request->has('foto')) {
            $request->validate([
                'foto' => ['image']
            ]);
            $fileImagen = $request->file('foto');
            $nombre = "img/vecinos/" . uniqid() . "_" . $fileImagen->getClientOriginalName();
            if (basename($vecino->foto) != "default.png") {
                unlink($vecino->foto);
            }

            Storage::Disk("public")->put($nombre, \File::get($fileImagen));
            $vecino->update(['foto' => "storage/" . $nombre]);
        }

        return redirect()->route('vecino.index')->with('mensaje', "Vecino actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vecino  $vecino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vecino $vecino)
    {
        $foto = basename($vecino->foto);

        if ($foto != 'default.png') {
            unlink($vecino->foto);
        }
        $vecino->delete();
        return redirect()->route('vecino.index')->with("mensaje", "Vecino Borrado correctamente.");
    }
}
