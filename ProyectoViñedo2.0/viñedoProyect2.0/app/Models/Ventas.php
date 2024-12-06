<?php

// app/Models/Venta.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable = [
        'categoria_id',
        'cliente_id',
        'id_cantidad',
        'id_valor_final',
        'id_estado_venta',
        'cancelado',
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id', 'id');
    }

    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class, 'categoria_id', 'id');
    }

}
