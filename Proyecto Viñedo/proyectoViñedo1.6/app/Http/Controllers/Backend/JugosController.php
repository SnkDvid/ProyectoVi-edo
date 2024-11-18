<?php

namespace App\Http\Controllers\Backend;

use App\Models\Catalogo;
use App\Models\Jugos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JugosController extends Controller
{
    public function index()
    {
        $jugos = Catalogo::where('id_categoria', 'jugos')->where('habilitado', 1)->get();
        $batidos = Catalogo::where('id_categoria', 'batidos')->where('habilitado', 1)->get();
        
        return view('admin.views.jugos', compact('jugos', 'batidos'));
       
    }
}
