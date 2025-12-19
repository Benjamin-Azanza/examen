@extends('layouts.app')

@section('title', 'Préstamos')

@section('contenido')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex justify-content-between mb-3">
    <h2>Listado de Préstamos</h2>
    <a href="{{ route('prestamos.create') }}" class="btn btn-primary">
        Nuevo Préstamo
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Persona</th>
            <th>Fecha límite</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($prestamos as $prestamo)
        <tr>
            <td>{{ $prestamo->id }}</td>
            <td>{{ $prestamo->titulo_libro }}</td>
            <td>{{ $prestamo->nombre_persona }}</td>
            <td>{{ $prestamo->fecha_limite->format('d/m/Y') }}</td>
            <td>
                @if($prestamo->devuelto)
                    <span class="badge bg-success">Devuelto</span>
                @else
                    <span class="badge bg-warning text-dark">Prestado</span>
                @endif
            </td>
            <td>
                <a href="{{ route('prestamos.edit', $prestamo) }}"
                   class="btn btn-sm btn-warning">
                    Editar
                </a>

                @if(!$prestamo->devuelto)
                <form action="{{ route('prestamos.devolver', $prestamo) }}"
                      method="POST"
                      style="display:inline">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-sm btn-success">
                        Devolver
                    </button>
                </form>
                @endif

                <form action="{{ route('prestamos.destroy', $prestamo) }}"
                      method="POST"
                      style="display:inline"
                      onsubmit="return confirm('¿Eliminar definitivamente?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">
                No hay préstamos registrados.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
