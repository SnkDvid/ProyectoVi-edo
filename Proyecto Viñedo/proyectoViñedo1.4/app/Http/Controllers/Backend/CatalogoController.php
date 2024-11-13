<?php

namespace App\Http\Controllers\Backend;
use App\Models\Catalogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $catalogos = Catalogo::where('habilitado', 1)->get();
        //$catalogos = Catalogo::all();

        return view('admin.views.catalogo', compact('catalogos'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalogo.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
       'image' => 'required|image',
       'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
       'peso' => 'required',
        'categoria' => 'required',
    ]);

    $imagePath = $request->file('image')->store('catalogos', 'public');

    Catalogo::create([
        'id_imagen_producto' => $imagePath,
        'id_nombre_producto' => $request->nombre,
        'id_descripcion' => $request->descripcion,
        'id_precio' => $request->precio,
        'id_peso' => $request->peso,
        'id_categoria' => $request->categoria,
    ]);

    toastr()->success('Se creo correctamente el producto.', 'Notificacion');
    return redirect()->route('admin.catalogo.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catalogos = Catalogo::findOrFail($id);
        return view('admin.catalogo.index', compact('catalogos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $catalogos = Catalogo::findOrFail($id);

    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'peso' => 'required',
        'categoria' => 'required',
    ]);

    // Si hay una nueva imagen, eliminamos la anterior antes de actualizar
    if ($request->hasFile('image')) {
        // Borrar la imagen antigua si existe
        if ($catalogos->id_imagen_producto && Storage::disk('public')->exists($catalogos->id_imagen_producto)) {
            Storage::disk('public')->delete($catalogos->id_imagen_producto);
        }

        // Guardar la nueva imagen y actualizar el path en la base de datos
        $imagePath = $request->file('image')->store('catalogos', 'public');
        $catalogos->id_imagen_producto = $imagePath;
    }

    // Actualizar los demás campos
    $catalogos->id_nombre_producto = $request->nombre;
    $catalogos->id_descripcion = $request->descripcion;
    $catalogos->id_precio = $request->precio;
    $catalogos->id_peso = $request->peso;
    $catalogos->id_categoria = $request->categoria;

    $catalogos->save();

    toastr()->success('Se actualizó correctamente el producto.', 'Notificación');
    return redirect()->route('admin.catalogo.index');
}

public function inhabilitar($id)
{
    $catalogo = Catalogo::findOrFail($id);
    $catalogo->habilitado = 0;
    $catalogo->save();

    toastr()->success('Producto inhabilitado correctamente.', 'Notificación');
    return redirect()->route('admin.views.inhabilitados');
}

public function catalogoInhabilitados()
{   
    $catalogos = Catalogo::where('habilitado', 0)->get();
    return view('admin.views.inhabilitados', compact('catalogos'));
}

public function habilitar($id)
{
    $catalogo = Catalogo::findOrFail($id);
    $catalogo->habilitado = 1;
    $catalogo->save();

    toastr()->success('Producto habilitado correctamente.', 'Notificación');
    return redirect()->route('admin.catalogo.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    

    
}
