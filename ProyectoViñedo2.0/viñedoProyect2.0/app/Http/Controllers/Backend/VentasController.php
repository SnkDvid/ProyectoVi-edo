<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ventas;
use App\Models\Catalogo;
use App\Models\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\VentaCancelada;
use Illuminate\Support\Facades\Mail;

class VentasController extends Controller
{
    public function estado()
{   
    // Usamos paginate() en lugar de get() para hacer paginación.
    $ventas = Ventas::with(['cliente', 'catalogo'])
                    ->where('cancelado', 1)
                    ->paginate(7); // Aquí defines el número de registros por página (en este caso 10)

    return view('admin.views.estado', compact('ventas'));
}


    public function update(Request $request, $id)
    {
        $venta = Ventas::findOrFail($id);
        $venta->id_cantidad = $request->input('id_cantidad');
        $venta->id_valor_final = $request->input('id_valor_final');
        $venta->id_estado_venta = $request->input('id_estado_venta');
        $venta->save();
        // Redirige o devuelve una respuesta adecuada
        return redirect()->back()->with('success', 'Venta actualizada exitosamente.');
    }

    

    public function cancelar($id)
{
    $venta = Ventas::with('cliente', 'catalogo')->findOrFail($id);
    
    // Marca el producto como inhabilitado o retíralo de la venta
    $venta->cancelado = 0;
    $venta->save();
    
    // Enviar correo de notificación
    \Mail::to($venta->cliente->id_correo_cliente)->send(
        new \App\Mail\ProductoQuitado($venta, $venta->catalogo)
    );
    return redirect()->back()->with('success', 'El producto ha sido removido y el cliente ha sido notificado.');
}



    public function cancelarVentaTotalmente($clienteId)
{
    // Actualiza el estado de todas las ventas del cliente a "Cancelado"
    \App\Models\Ventas::where('cliente_id', $clienteId)->update([
        'id_estado_venta' => 'Cancelado',
        'cancelado' => 0
    ]);

    // Recuperar todas las ventas canceladas del cliente
    $ventas = \App\Models\Ventas::with('cliente', 'catalogo')
                                ->where('cliente_id', $clienteId)
                                ->where('cancelado', 0)
                                ->get();

    // Enviar correo al cliente
    $cliente = \App\Models\Clientes::find($clienteId);
    if ($cliente && $cliente->id_correo_cliente) {
        Mail::to($cliente->id_correo_cliente)->send(new VentaCancelada($ventas));
    } else {
        return redirect()->back()->with('error', 'Cliente no encontrado o sin correo.');
    }

    return redirect()->back()->with('success', 'Todas las ventas del cliente han sido canceladas y se envió la notificación.');
}

    
    


    
    public function ventasCanceladas()
    {
        $ventas = Ventas::where('cancelado', 0)->get();
        return view('admin.views.InhabilitadoVentas', compact('ventas'));
    }

    public function activar($id)
    {
        $venta = Ventas::findOrFail($id);
        $venta->cancelado = 1;
        $venta->save();
        return redirect()->back()->with('success', 'Venta activada exitosamente.');
    }
    

    public function pdf()
    {   
        $ventas = Ventas::where('cancelado',1)->get();
        $pdf = Pdf::loadView('admin.views.reporteVentas', compact('ventas'))->setPaper('a4','landscape');
        return $pdf->stream('reporte_ventas.pdf');
       
    }


}
