<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompraConfirmadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $items;
    public $total;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cliente, $items, $total)
    {
        $this->cliente = $cliente;
        $this->items = $items;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.compra_confirmada')
                    ->subject('Confirmación de Compra')
                    ->to($this->cliente->id_correo_cliente) // Correo del cliente
                    ->with([
                        'cliente' => $this->cliente,
                        'items' => $this->items,
                        'total' => $this->total,
                    ]);
    }
    
}
