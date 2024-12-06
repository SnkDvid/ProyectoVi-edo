<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CatalogoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::post('/catalogo/store', [CatalogoController::class, 'store'])->name('admin.catalogo.store');
    Route::get('/catalogo/{id}/edit', [CatalogoController::class, 'edit'])->name('catalogo.edit');
    Route::put('/catalogo/{id}', [CatalogoController::class, 'update'])->name('admin.catalogo.update');
    Route::delete('/catalogo/{id}', [CatalogoController::class, 'destroy'])->name('catalogo.destroy');
    //inhabilitar y habilitar producto del catalogo
    Route::put('/catalogo/inhabilitar/{id}', [CatalogoController::class, 'inhabilitar'])->name('admin.catalogo.inhabilitar');
    Route::put('/catalogo/habilitar/{id}', [CatalogoController::class, 'habilitar'])->name('admin.catalogo.habilitar');
    //ver inhabilitados
    Route::get('/catalogo/inhabilitados', [CatalogoController::class, 'catalogoInhabilitados'])->name('admin.views.inhabilitados');

    
    //admin estado venta 
    Route::get('/admin/estado', [AdminController::class, 'estado'])->name('admin.estado');
});

Route::middleware(['auth','role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');
});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

