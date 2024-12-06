<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VentasController;
use App\Http\Controllers\Backend\IndexController;
use App\Http\Controllers\Backend\CartController;
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

//Route::get('/', function () {
   // return view('welcome');
//});

//Route::get('admin/dashboard', function () {
    ///return view('admin.dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard y perfil de administrador
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/admin/profile/update/password', [AdminProfileController::class, 'updatePassword'])->name('admin.password.update');

    // Rutas del catálogo
    Route::get('/admin/catalogo', [CatalogoController::class, 'index'])->name('admin.catalogo.index');
    Route::post('/admin/catalogo/store', [CatalogoController::class, 'store'])->name('admin.catalogo.store');
    Route::get('/admin/catalogo/{id}/edit', [CatalogoController::class, 'edit'])->name('catalogo.edit');
    Route::put('/admin/catalogo/{id}', [CatalogoController::class, 'update'])->name('admin.catalogo.update');
    Route::delete('/admin/catalogo/{id}', [CatalogoController::class, 'destroy'])->name('catalogo.destroy');

    // Inhabilitar y habilitar productos
    Route::put('/admin/catalogo/inhabilitar/{id}', [CatalogoController::class, 'inhabilitar'])->name('admin.catalogo.inhabilitar');
    Route::put('/admin/catalogo/habilitar/{id}', [CatalogoController::class, 'habilitar'])->name('admin.catalogo.habilitar');

    // Ver productos inhabilitados
    Route::get('/catalogo/inhabilitados', [CatalogoController::class, 'catalogoInhabilitados'])->name('admin.views.inhabilitados');

    // Categorías específicas
    Route::get('/admin/jugos', [JugosController::class, 'index'])->name('admin.jugos');
    Route::get('/admin/desayunos', [DesayunosController::class, 'index'])->name('admin.desayunos');
    Route::get('/admin/pulpas', [PulpasController::class, 'index'])->name('admin.pulpas');
    Route::get('/admin/batidos', [BatidosController::class, 'index'])->name('admin.batidos');

    // Estado de ventas
    Route::get('/admin/ventas', [VentasController::class, 'estado'])->name('admin.estado');
    Route::put('/admin/ventas/{id}', [VentasController::class, 'update'])->name('ventas.update');

    //cancelar/inhabilitar ventas y activar/habilitarventas
    Route::put('/admin/ventas/cancelar/{id}', [VentasController::class, 'cancelar'])->name('admin.ventas.cancelar');
    //Route::put('/admin/ventas/activar/{id}', [VentasController::class, 'activar'])->name('admin.ventas.activar');
    //ver ventas inhabilitadas/canceladas
    Route::get('/ventas/canceladas', [VentasController::class, 'ventasCanceladas'])->name('admin.views.InhabilitadoVentas');
    Route::put('/admin/ventas/cancelar-totalmente/{clienteId}', [VentasController::class, 'cancelarVentaTotalmente'])->name('admin.ventas.cancelarTotalmente');

    
    // Productos por categoría
    Route::get('/productos/por-categoria', [CatalogoController::class, 'getProductosPorCategoria']);
    Route::get('/productos/{id}', [CatalogoController::class, 'getProductoPorId']);

    //reportes pdf
    Route::get('/admin/ventas/reporte-pdf', [VentasController::class, 'pdf'])->name('admin.views.reporteVentas');

    
});


Route::middleware(['auth','role:vendor'])->group(function () {
  Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/', [IndexController::class, 'index'])->name('users.index');
//carrito de compras 
//Route::post('cart/add', [CartController::class, 'add'])->name('add');
Route::post('/add', [CartController::class, 'add'])->name('add');

Route::get('cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('cart/clear', [CartController::class, 'clear'])->name('clear');
Route::post('cart/removeitem', [CartController::class, 'removeItem'])->name('removeitem');
Route::post('cart/confirmarCompra', [CartController::class, 'confirmarCompra'])->name('confirmarCompra');



