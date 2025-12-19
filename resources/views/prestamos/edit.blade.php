@extends('layouts.app')

@section('title', 'Editar Préstamo')

@section('contenido')

<h1>Editar Préstamo</h1>

<form action="{{ route('prestamos.update', $prestamo) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Título del libro</label>
        <input
            type="text"
            name="titulo_libro"
            class="form-control"
            value="{{ $prestamo->titulo_libro }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre de la persona</label>
        <input
            type="text"
            name="nombre_persona"
            class="form-control"
            value="{{ $prestamo->nombre_persona }}"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input
            type="text"
            name="telefono"
            class="form-control"
            value="{{ $prestamo->telefono }}"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha límite</label>
        <input
            type="date"
            name="fecha_limite"
            class="form-control"
            value="{{ $prestamo->fecha_limite->format('Y-m-d') }}"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">
        Actualizar
    </button>

    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">
        Volver
    </a>
</form>

@endsection
