<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ventas;


class ProductoQuitado extends Mailable
{
    public $productoNombre;
    public $categoria;
    public $precio;

    // Recibe los datos del producto
    public function __construct(Ventas $venta, $catalogo)
    {
        $this->productoNombre = $catalogo->id_nombre_producto; // O el campo que corresponde al nombre del producto
        $this->categoria = $catalogo->id_categoria; // Asegúrate de que la relación esté correctamente definida
        $this->precio = $venta->id_valor_final; // El precio del producto
    }

    public function build()
    {
        return $this->subject('Producto Quitado de la Venta')
                    ->view('emails.producto_quitado');
    }
}

