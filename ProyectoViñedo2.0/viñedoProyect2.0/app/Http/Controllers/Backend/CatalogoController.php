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
    public function index()
    {
        $catalogos = Catalogo::where('habilitado', 1)->get();
        return view('admin.views.catalogo', compact('catalogos'));
    }

    public function create()
    {
        return view('admin.catalogo.create');
    }

public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,png|max:2048',
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'peso' => 'required',
        'categoria' => 'required',
    ]);

    // Generar el nombre único de la imagen
    $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
    
    // Ruta real en el servidor (dentro de /public_html/storage/catalogos)
    $destinationPath = base_path('public/storage/catalogos'); 
    
    // Mover la imagen a la ruta especificada
    $request->file('image')->move($destinationPath, $imageName);

    // Guardar la ruta relativa en la base de datos para acceso público
    $catalogo = Catalogo::create([
        'id_imagen_producto' => 'storage/catalogos/' . $imageName, // Ruta relativa
        'id_nombre_producto' => $request->nombre,
        'id_descripcion' => $request->descripcion,
        'id_precio' => $request->precio,
        'id_peso' => $request->peso,
        'id_categoria' => $request->categoria,
    ]);

    $this->storeCategorySpecificData($request->categoria, $catalogo->id);

    toastr()->success('Producto creado correctamente.', 'Notificación');
    return redirect()->route('admin.catalogo.index');
}




    public function edit(string $id)
    {
        $catalogos = Catalogo::findOrFail($id);
        return view('admin.catalogo.edit', compact('catalogos'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'precio' => 'required|numeric',
        'peso' => 'required',
        'categoria' => 'required',
    ]);

    $catalogo = Catalogo::findOrFail($id);

    if ($catalogo->id_categoria !== $request->categoria) {
        $this->deleteCategorySpecificData($catalogo->id_categoria, $catalogo->id);
    }

    $catalogo->update([
        'id_nombre_producto' => $request->nombre,
        'id_descripcion' => $request->descripcion,
        'id_precio' => $request->precio,
        'id_peso' => $request->peso,
        'id_categoria' => $request->categoria,
    ]);

    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior si existe
        if ($catalogo->id_imagen_producto) {
            $oldImagePath = base_path('public/' . $catalogo->id_imagen_producto);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Guardar la nueva imagen
        $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
        $destinationPath = base_path('public/storage/catalogos');
        $request->file('image')->move($destinationPath, $imageName);

        $catalogo->update(['id_imagen_producto' => 'storage/catalogos/' . $imageName]);
    }

    toastr()->success('Producto actualizado correctamente.', 'Notificación');
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

    public function habilitar($id)
    {
        $catalogo = Catalogo::findOrFail($id);
        $catalogo->habilitado = 1;
        $catalogo->save();

        toastr()->success('Producto habilitado correctamente.', 'Notificación');
        return redirect()->route('admin.catalogo.index');
    }

    public function catalogoInhabilitados()
    {
        $catalogos = Catalogo::where('habilitado', 0)->get();
        return view('admin.views.inhabilitados', compact('catalogos'));
    }

    // En CatalogoController
    

    public function getProductosPorCategoria(Request $request)
    {
        $categoriaId = $request->query('categoria_id');
    
        if (!$categoriaId) {
            return response()->json(['error' => 'No se proporcionó el ID de la categoría.'], 400);
        }
    
        $productos = Catalogo::where('id_categoria', $categoriaId)
                             ->where('habilitado', 1) // Si tienes este campo en tu tabla
                             ->get(['id', 'id_nombre_producto']); // Selecciona solo los campos necesarios
    
        if ($productos->isEmpty()) {
            return response()->json(['error' => 'No hay productos para esta categoría.'], 404);
        }
    
        return response()->json($productos);
    }
    
    



    private function storeCategorySpecificData($categoria, $catalogoId)
    {
        $models = [
            'jugos' => Jugos::class,
            'desayunos' => Desayunos::class,
            'pulpas' => Pulpas::class,
            'batidos' => Batidos::class,
        ];

        if (array_key_exists($categoria, $models)) {
            $models[$categoria]::create(['categoria_id' => $catalogoId]);
        }
    }

    private function deleteCategorySpecificData($categoria, $catalogoId)
    {
        $models = [
            'jugos' => Jugos::class,
            'desayunos' => Desayunos::class,
            'pulpas' => Pulpas::class,
            'batidos' => Batidos::class,
        ];

        if (array_key_exists($categoria, $models)) {
            $models[$categoria]::where('categoria_id', $catalogoId)->delete();
        }
    }
    
} 