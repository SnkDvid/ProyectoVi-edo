<?php

namespace App\Http\Controllers\Backend;
use App\Models\Catalogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $jugos = Catalogo::where('id_categoria', 'jugos')->where('habilitado', 1)->get();
        $desayunos = Catalogo::where('id_categoria', 'desayunos')->where('habilitado', 1)->get();
       $pulpas = Catalogo::where('id_categoria', 'pulpas')->where('habilitado', 1)->get();
        $batidos = Catalogo::where('id_categoria', 'batidos')->where('habilitado', 1)->get();
        
        return view('frontend.home.home', compact('jugos', 'batidos', 'desayunos', 'pulpas'));
       
    }
}


