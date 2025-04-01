<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PublicProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoEspecialController;
use App\Http\Controllers\Admin\PedidoAdminController;
use App\Http\Controllers\Admin\PedidoEspecialAdminController;

/*
|--------------------------------------------------------------------------
| Rutas públicas (sin login)
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => redirect()->route('productos.publicos'));

Route::get('/productos', [PublicProductoController::class, 'index'])->name('productos.publicos');

// Carrito de compras
Route::prefix('carrito')->group(function () {
    Route::get('/', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::delete('/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar'); // ✅
    Route::post('/incrementar/{id}', [CarritoController::class, 'incrementar'])->name('carrito.incrementar');
    Route::post('/decrementar/{id}', [CarritoController::class, 'decrementar'])->name('carrito.decrementar');
    Route::get('/confirmar', [PedidoController::class, 'create'])->name('pedido.create');
    Route::post('/confirmar', [PedidoController::class, 'store'])->name('pedido.store');
});

// Pedido especial


/*
|--------------------------------------------------------------------------
| Rutas autenticadas (usuarios registrados)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/pedido-especial', [PedidoEspecialController::class, 'create'])->name('pedido.especial.create');
        Route::post('/pedido-especial', [PedidoEspecialController::class, 'store'])->name('pedido.especial.store');
    });
});

/*
|--------------------------------------------------------------------------
| Rutas administrador
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('admin.dashboard');

    Route::prefix('pedidos')->group(function () {
        Route::get('/', [PedidoAdminController::class, 'index'])->name('admin.pedidos.index');
        Route::post('/{pedido}/estado', [PedidoAdminController::class, 'cambiarEstado'])->name('admin.pedidos.estado');
    });

    Route::prefix('pedidos-especiales')->group(function () {
        Route::get('/', [PedidoEspecialAdminController::class, 'index'])->name('admin.pedidos-especiales.index');
        Route::post('/{id}/responder', [PedidoEspecialAdminController::class, 'responder'])->name('admin.pedidos-especiales.responder');
    });

    Route::resource('categorias', CategoriaController::class);
    Route::resource('productos', ProductoController::class);
});

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Redirección post-login
|--------------------------------------------------------------------------
*/

Route::get('/redirect', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('productos.publicos');
})->middleware('auth')->name('redirect.user');
