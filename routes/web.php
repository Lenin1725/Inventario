<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\AuthController;

Route::post('/product/{product}/editar', [ProductController::class, 'edit'])
     ->name('product.edit.post');

//ruta para los productos
Route::get('producto/create', [ProductController::class, 'create'])
     ->name('producto.create');

// Ruta para ver el ticket de venta, que puede ser llamada desde la venta
Route::get('/venta/{ventaId}/ticket', [VentaController::class, 'generarTicket'])->name('venta.ticket');

// Ruta principal (Inicio de la aplicación)
Route::get('/', function () {
    return view('welcome');
});

//ruta de inicio de sesion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//ruta de ingreso del usuario valido
Route::get('/dashboard', function () {
    return view('index');
})->middleware('auth');

// ruta GET para mostrar index.blade.php
Route::get('/', function () {
    return view('index');
})->name('index');



