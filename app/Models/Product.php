<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Inventario';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombrecorto',
        'descripcion',
        'serie',
        'color',
        'fechaadquisicion',
        'tipoadquisicion',
        'observaciones',
        'areas_id',
    ];

    /**
     * Get the area that owns the inventory.
     */
    public function area() {
        return $this->belongsTo(Area::class, 'Areas_id');
    }
}
