<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::orderBy('id', 'asc')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        return view('prestamos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_libro'    => 'required|max:150',
            'nombre_persona' => 'required|max:100',
            'fecha_limite'   => 'required|date',
        ]);

        Prestamo::create([
            'titulo_libro'    => $request->titulo_libro,
            'nombre_persona' => $request->nombre_persona,
            'telefono'       => $request->telefono,
            'fecha_limite'   => $request->fecha_limite,
            'devuelto'       => false,
        ]);

        return redirect()->route('prestamos.index')
            ->with('success', 'Préstamo registrado correctamente');
    }

    public function edit(Prestamo $prestamo)
    {
        return view('prestamos.edit', compact('prestamo'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'titulo_libro'    => 'required|max:150',
            'nombre_persona' => 'required|max:100',
            'fecha_limite'   => 'required|date',
        ]);

        $prestamo->update([
            'titulo_libro'    => $request->titulo_libro,
            'nombre_persona' => $request->nombre_persona,
            'telefono'       => $request->telefono,
            'fecha_limite'   => $request->fecha_limite,
        ]);

        return redirect()->route('prestamos.index')
            ->with('success', 'Préstamo actualizado correctamente');
    }

    public function destroy(Prestamo $prestamo)
    {
        $prestamo->update(['devuelto' => true]);

        return redirect()->route('prestamos.index')
            ->with('success', 'Préstamo marcado como devuelto');
    }
}
