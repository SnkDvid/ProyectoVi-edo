<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pulpas extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
    ];

    // Relación con el modelo Catalogo
    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class, 'categoria_id');
    }
}
