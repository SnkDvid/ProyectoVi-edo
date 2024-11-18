<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CatalogoController;
use App\Http\Controllers\Backend\JugosController;
use App\Http\Controllers\Backend\DesayunosController;
use App\Http\Controllers\Backend\PulpasController;
use App\Http\Controllers\Backend\BatidosController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\VendorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('admin/dashboard', function () {
    ///return view('admin.dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/admin/profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('admin.password.update');

    //admin catalogo 
    //Route::get('/admin/catalogo', [AdminController::class, 'catalogo'])->name('admin.catalogo');
    Route::get('/admin/catalogo', [CatalogoController::class, 'index'])->name('admin.catalogo.index');
    Route::post('admin/catalogo/store', [CatalogoController::class, 'store'])->name('admin.catalogo.store');
    Route::get('/admin/catalogo/{id}/edit', [CatalogoController::class, 'edit'])->name('catalogo.edit');
    Route::put('/admin/catalogo/{id}', [CatalogoController::class, 'update'])->name('admin.catalogo.update');
    Route::delete('/admin/catalogo/{id}', [CatalogoController::class, 'destroy'])->name('catalogo.destroy');
    //inhabilitar y habilitar producto del catalogo
    Route::put('/admin/catalogo/inhabilitar/{id}', [CatalogoController::class, 'inhabilitar'])->name('admin.catalogo.inhabilitar');
    Route::put('/admin/catalogo/habilitar/{id}', [CatalogoController::class, 'habilitar'])->name('admin.catalogo.habilitar');
    //ver inhabilitados
    Route::get('/catalogo/inhabilitados', [CatalogoController::class, 'catalogoInhabilitados'])->name('admin.views.inhabilitados');
    //jugos
    Route::get('/admin/jugos', [JugosController::class, 'index'])->name('admin.jugos');
    //desayunos
    Route::get('/admin/desayunos', [DesayunosController::class, 'index'])->name('admin.desayunos');
    //pulpas 
    Route::get('/admin/pulpas', [PulpasController::class, 'index'])->name('admin.pulpas');
     //pulpas 
     Route::get('/admin/batidos', [BatidosController::class, 'index'])->name('admin.batidos');
    //admin estado venta 
    Route::get('/admin/estado', [AdminController::class, 'estado'])->name('admin.estado');
    
});

Route::middleware(['auth','role:vendor'])->group(function () {
  Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

