<?php

namespace App\Http\Controllers\Backend;


use App\Models\Catalogo;
use App\Models\Batidos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BatidosController extends Controller
{
    public function index()
    {
        $batidos = Catalogo::where('id_categoria', 'batidos')->where('habilitado', 1)->get();
        return view('admin.views.batidos', compact('batidos'));
    }
}
