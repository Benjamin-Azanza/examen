<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::orderBy('created_at', 'desc')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        return view('prestamos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(Prestamo::rules());

        Prestamo::crear($data);

        return redirect()->route('prestamos.index')
            ->with('success', 'Préstamo registrado correctamente');
    }

    public function edit(Prestamo $prestamo)
    {
        return view('prestamos.edit', compact('prestamo'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $data = $request->validate(Prestamo::rules());

        $prestamo->editar($data);

        return redirect()->route('prestamos.index')
            ->with('success', 'Préstamo actualizado correctamente');
    }

    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();

        return redirect()->route('prestamos.index')
            ->with('success', 'Préstamo eliminado definitivamente');
    }

    public function devolver(Prestamo $prestamo)
    {
        $prestamo->devolver();

        return redirect()->route('prestamos.index')
            ->with('success', 'Libro marcado como devuelto');
    }
}
