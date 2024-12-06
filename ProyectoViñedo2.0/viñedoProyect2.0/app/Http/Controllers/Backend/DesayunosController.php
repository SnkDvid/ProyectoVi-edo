<?php

namespace App\Http\Controllers\Backend;

use App\Models\Catalogo;
use App\Models\Desayunos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesayunosController extends Controller
{
    public function index()
    {   
        $desayunos = Catalogo::where('id_categoria', 'desayunos')->where('habilitado', 1)->get();
        return view('admin.views.desayunos', compact('desayunos'));
    }
}
