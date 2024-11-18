<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pulpas;
use App\Models\Catalogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PulpasController extends Controller
{
    public function index() 
{
    $pulpas = Catalogo::where('id_categoria', 'pulpas')->where('habilitado', 1)->get();
    return view('admin.views.pulpas', compact('pulpas'));
}

}
