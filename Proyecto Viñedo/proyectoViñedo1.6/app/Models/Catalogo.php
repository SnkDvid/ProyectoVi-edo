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

       // Relación con la tabla pulpas
    public function pulpas()
    {
        return $this->hasMany(Pulpas::class, 'categoria_id');
    }

    // Relación con la tabla jugos
    public function jugos()
    {
        return $this->hasMany(jugos::class, 'categoria_id');
    }

    // Relación con la tabla desayunos
    public function desayunos()
    {
        return $this->hasMany(desayunos::class, 'categoria_id');
    }

    // Relación con la tabla batidos
    public function batidos()
    {
        return $this->hasMany(batidos::class, 'categoria_id');
    }
}



