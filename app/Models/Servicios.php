<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'duracion', 'precio'];

    protected $casts = [
        'precio' => 'decimal:2', // Define el campo 'precio' como decimal con dos decimales
    ];

    // Reglas de validación si es necesario
    public static $rules = [
        'nombre' => 'required|string',
        'duracion' => 'required|integer',
        'precio' => 'required|numeric',
    ];
}
