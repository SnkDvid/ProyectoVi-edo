<?php

namespace App\Http\Controllers\Backend;
use App\Models\Catalogo;
use App\Models\Jugos;
use App\Models\Desayunos;
use App\Models\Pulpas;
use App\Models\Batidos;
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

        // Crear el registro en la tabla catalogos
        $catalogo = Catalogo::create([
            'id_imagen_producto' => $imagePath,
            'id_nombre_producto' => $request->nombre,
            'id_descripcion' => $request->descripcion,
            'id_precio' => $request->precio,
            'id_peso' => $request->peso,
            'id_categoria' => $request->categoria,
        ]);

        // Si la nueva categoría es "jugos", crear un nuevo registro en la tabla jugos
        if ($request->categoria === 'jugos') {
            Jugos::create([
                'categoria_id' => $catalogo->id,
            ]);
            // Si la nueva categoría es "desayunos", crear un nuevo registro en la tabla desayunos
        } elseif ($request->categoria === 'desayunos') {
            Desayunos::Create([
                'categoria_id' => $catalogo->id,
            ]);
            // Si la nueva categoría es "pulpas", crear un nuevo registro en la tabla pulpas
        } elseif ($request->categoria === 'pulpas') {
            Pulpas::create([
                'categoria_id' => $catalogo->id
            ]);
            // Si la nueva categoría es "batidos", crear un nuevo registro en la tabla batidos
        } elseif ($request->categoria === 'batidos') {
            Batidos::create([
                'categoria_id' => $catalogo->id
            ]);
        }

            toastr()->success('Se creó correctamente el producto.', 'Notificación');
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
public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'peso' => 'required',
        'categoria' => 'required',
    ]);

    // Obtener el producto a actualizar
    $catalogo = Catalogo::findOrFail($id);

    if ($catalogo->id_categoria !== $request->categoria) {
        // Si la categoría ha cambiado, eliminar el registro de la tabla correspondiente
        if ($catalogo->id_categoria === 'jugos') {
            // Eliminar el registro relacionado de la tabla jugos si era "jugo"
            Jugos::where('categoria_id', $catalogo->id)->delete();
        } elseif ($catalogo->id_categoria === 'desayunos') {
            // Eliminar el registro relacionado de la tabla desayunos si era "desayuno"
            Desayunos::where('categoria_id', $catalogo->id)->delete();
        } elseif ($catalogo->id_categoria === 'pulpas') {
             // Eliminar el registro relacionado de la tabla desayunos si era "desayuno"
             Pulpas::where('categoria_id', $catalogo->id)->delete();
        } elseif ($catalogo->id_categoria === 'batidos'){
            // Eliminar el registro relacionado de la tabla batidos si era "batido"
            Batidos::where('categoria_id', $catalogo->id)->delete();
        } 
    }

    // Actualizar los campos del producto
    $catalogo->update([
        'id_nombre_producto' => $request->nombre,
        'id_descripcion' => $request->descripcion,
        'id_precio' => $request->precio,
        'id_peso' => $request->peso,
        'id_categoria' => $request->categoria,
    ]);

    // Si la nueva categoría es "jugos", crear un nuevo registro en la tabla jugos
    if ($request->categoria === 'jugos') {
        Jugos::create([
            'categoria_id' => $catalogo->id,
        ]);
        // Si la nueva categoría es "desayunos", crear un nuevo registro en la tabla desayunos
    } elseif ($request->categoria === 'desayunos'){
        Desayunos::Create([
            'categoria_id' => $catalogo->id,
        ]);
         // Si la nueva categoría es "pulpas", crear un nuevo registro en la tabla pulpas
    } elseif ($request->categoria === 'pulpas'){
        Pulpas::create([
            'categoria_id' => $catalogo->id
        ]);
         // Si la nueva categoría es "batidos", crear un nuevo registro en la tabla batidos
    } elseif ($request->categoria === 'batidos'){
        Batidos::create([
            'categoria_id' => $catalogo->id 
        ]);
    }

    // Manejo de la imagen si se ha subido una nueva
    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior del almacenamiento
        if ($catalogo->id_imagen_producto) {
            Storage::disk('public')->delete($catalogo->id_imagen_producto);
        }
        
        // Subir la nueva imagen y actualizar la ruta
        $imagePath = $request->file('image')->store('catalogos', 'public');
        $catalogo->update(['id_imagen_producto' => $imagePath]);
    }

    toastr()->success('El producto ha sido actualizado correctamente.');
    return redirect()->route('admin.catalogo.index');
}


public function inhabilitar($id)
{
    $catalogo = Catalogo::findOrFail($id);
    $catalogo->habilitado = 0;
    $catalogo->save();

    toastr()->success('Producto inhabilitado correctamente.', 'Notificación');
    return redirect()->route('admin.catalogo.index');
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
