<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'Areas';
    public $timestamps = false;


    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre', 
        'ubicacion',
    ];
}
