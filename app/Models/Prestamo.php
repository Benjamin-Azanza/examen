<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'titulo_libro',
        'nombre_persona',
        'telefono',
        'fecha_limite',
        'devuelto'
    ];

    protected $casts = [
        'fecha_limite' => 'date',
        'devuelto'     => 'boolean'
    ];

    public static function rules(): array
    {
        return [
            'titulo_libro'    => 'required|string|max:150',
            'nombre_persona' => 'required|string|max:100',
            'telefono'       => 'nullable|digits_between:7,15',
            'fecha_limite'   => 'required|date',
        ];
    }

    public static function crear(array $data): self
    {
        return self::create([
            'titulo_libro'    => $data['titulo_libro'],
            'nombre_persona' => $data['nombre_persona'],
            'telefono'       => $data['telefono'] ?? null,
            'fecha_limite'   => $data['fecha_limite'],
            'devuelto'       => false,
        ]);
    }

    public function editar(array $data): bool
    {
        return $this->update([
            'titulo_libro'    => $data['titulo_libro'],
            'nombre_persona' => $data['nombre_persona'],
            'telefono'       => $data['telefono'] ?? null,
            'fecha_limite'   => $data['fecha_limite'],
        ]);
    }

    public function devolver(): bool
    {
        return $this->update(['devuelto' => true]);
    }

    public function scopePendientes($query)
    {
        return $query->where('devuelto', false);
    }
}
