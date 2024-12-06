<?php

namespace App\Http\Controllers\Backend;

use App\Models\Catalogo;
use App\Models\Clientes;
use App\Models\Ventas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
class CartController extends Controller
{

    public function add(Request $request)
    {   
        
        $producto = Catalogo::find($request->id);
    
        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
    
        // Agregar al carrito
        Cart::add([
            'id' => $producto->id,
            'name' => $producto->id_nombre_producto,
            'price' => $producto->id_precio,
            'qty' => $request->cantidad,
            'options' => [
                'image' => $producto->id_imagen_producto,
                'category' => $producto->id_categoria,
                'weight' => $producto->id_peso,
                'description' => $producto->id_descripcion,
            ]
        ]);
    
        return redirect()->route('users.index')->with('success', 'Producto agregado al carrito');
    }
    
    public function checkout()
    {
        return view('users.cart.checkout');
    }

    public function removeItem(Request $request)
    {
       
        if (Cart::get($request->id)) {
            Cart::remove($request->id); 
            return redirect()->back()->with("success", "Producto Eliminado satisfactoriamente del carrito!");
        } else {
            return redirect()->back()->with();
        }
    }

    public function clear()
    {
        (Cart::destroy());
            return redirect()->back()->with("success", "Productos Eliminados satisfactoriamente del carrito!");
    }

    public function confirmarCompra(Request $request)
    {
        // Validación de los datos del cliente
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|numeric|digits_between:7,15', // Ajustar según el formato del teléfono
            'correo' => 'required|email|max:255',
            'direccion' => 'required|string|max:255',
            'barrio' => 'required|string|max:255',
        ]);
    
        // Validación del carrito
        $items = Cart::content();
        if ($items->isEmpty()) {
            return redirect()->back()->with('error', 'El carrito está vacío. Agrega productos antes de confirmar la compra.');
        }
    
        // Iniciar transacción
        DB::beginTransaction();
    
        try {
            // 1. Guardar información del cliente
            $cliente = Clientes::create([
                'id_nombre_cliente' => $request->nombre,
                'id_telefono_cliente' => $request->telefono,
                'id_correo_cliente' => $request->correo,
                'id_direccion_cliente' => $request->direccion,
                'id_barrio_cliente' => $request->barrio,
            ]);
    
            // 2. Recorrer el carrito y guardar la información en la tabla de ventas
            $total = 0;
    
            foreach ($items as $item) {
                Ventas::create([
                    'categoria_id' => $item->id,
                    'cliente_id' => $cliente->id,
                    'id_cantidad' => $item->qty,
                    'id_valor_final' => $item->qty * $item->price,
                    'id_estado_venta' => 'Pendiente',
                ]);
                $total += $item->qty * $item->price;
            }
    
            // 3. Limpiar el carrito
            Cart::destroy();
    
             //4. Enviar correo de confirmación al cliente
            \Mail::to($cliente->id_correo_cliente)->send(
                new \App\Mail\CompraConfirmadaMail($cliente, $items, $total)
            );
    
             //5. Enviar correo al trabajador
            \Mail::to('camilapalacios2021@gmail.com')->send(
                new \App\Mail\EnvioDetallesMail($cliente, $items, $total)
            );
    
            // Confirmar la transacción
            DB::commit();
    
            return redirect()->back()->with('success', 'Compra confirmada y correo enviado satisfactoriamente');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al confirmar la compra: ' . $e->getMessage());
        }
    }
    


    
}
