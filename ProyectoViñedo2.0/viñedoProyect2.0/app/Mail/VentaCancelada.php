<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VentaCancelada extends Mailable
{
    use Queueable, SerializesModels;

    public $ventas;  // Aquí declaramos la propiedad como $ventas

    /**
     * Create a new message instance.
     */
    public function __construct($ventas)
    {
        $this->ventas = $ventas;  // Asignamos la colección de ventas a la propiedad $ventas
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Notificación: Venta Cancelada')
                    ->view('emails.venta_cancelada');  // Vista del correo
    }
}
