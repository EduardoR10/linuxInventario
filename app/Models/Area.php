<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    // Si la tabla no sigue la convención de nombres (plural de la clase), puedes definir la tabla explícitamente:
    // protected $table = 'areas';

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre', 
        'ubicacion',
    ];
}
