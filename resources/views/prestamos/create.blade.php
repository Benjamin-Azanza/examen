@extends('layouts.app')

@section('title', 'Nuevo Préstamo')

@section('contenido')

<h1>Registrar Préstamo</h1>

<form action="{{ route('prestamos.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Título del libro</label>
        <input
            type="text"
            name="titulo_libro"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Nombre de la persona</label>
        <input
            type="text"
            name="nombre_persona"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input
            type="text"
            name="telefono"
            class="form-control"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha límite</label>
        <input
            type="date"
            name="fecha_limite"
            class="form-control"
            required
        >
    </div>

    <button type="submit" class="btn btn-primary">
        Guardar
    </button>

    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">
        Volver
    </a>
</form>

@endsection
