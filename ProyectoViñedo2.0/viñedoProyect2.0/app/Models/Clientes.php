<?php

// app/Models/Cliente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'id_nombre_cliente',
        'id_telefono_cliente',
        'id_correo_cliente',
        'id_direccion_cliente',
        'id_barrio_cliente',
    ];

    public function ventas()
    {
        return $this->hasMany(Ventas::class, 'cliente_id', 'id');
    }
}
