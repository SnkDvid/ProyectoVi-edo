<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    // Si el nombre de la tabla no es la forma plural del modelo
    protected $table = 'catalogos';

    // Si no usas timestamps
    public $timestamps = false;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'id_imagen_producto',
     'id_nombre_producto',
      'id_descripcion',
      'id_precio',
        'id_peso',
        'id_categoria',
      'habilitado'];
}


