<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\home_admin_controller;
use App\Http\Controllers\home_controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*              HOME                */

Route::get('/', [home_controller::class, 'inicio'])->name('/');
Route::get('/usuario', [home_controller::class, 'usuario'])->name('usuario');
Route::patch('/usuario/{usuario}', [home_controller::class, 'actualizarPerfil'])->name('actualizarPerfil');
Route::get('/pedidos', [home_controller::class, 'pedidos'])->name('pedidos');


/*              CESTA                */

Route::get('/cesta', [home_controller::class, 'cesta'])->name('cesta');
Route::get('/añadirCesta-{stock}', [home_controller::class, 'añadirCesta'])->name('añadirCesta');
Route::delete('/eliminarStockCesta-{stock}', [home_controller::class, 'eliminarStockCesta'])->name('eliminarStockCesta');
Route::delete('/eliminarCesta-{pedido}', [home_controller::class, 'eliminarCesta'])->name('eliminarCesta');
Route::get('/finalizarPedido-{pedido}', [home_controller::class, 'finalizarPedido'])->name('finalizarPedido');
Route::get('/realizarPedido-{pedido}', [home_controller::class, 'realizarPedido'])->name('realizarPedido');


/*              Categorias-Productos                */

Route::get('/rebajas', [home_controller::class, 'rebajas'])->name('rebajas');
Route::get('/categoria-{categoria}', [home_controller::class, 'categoria'])->name('categoria');
Route::get('/productos-{producto}', [home_controller::class, 'producto'])->name('producto');
Route::get('/busqueda', [home_controller::class, 'buscarProductos'])->name('buscarProductos');


/*              ADMIN                */

Route::get('/admin', [home_admin_controller::class, 'productos'])->name('admin');

Route::get('/admin/productos', [home_admin_controller::class, 'productos'])->name('adminProductos');
Route::post('/admin/productos/nuevoProducto', [home_admin_controller::class, 'nuevoProducto'])->name('nuevoProducto');
Route::patch('/admin/productos/{producto}', [home_admin_controller::class, 'actualizarProducto'])->name('actualizarProducto');
Route::delete('/admin/productos/{categoria}', [home_admin_controller::class, 'eliminarProducto'])->name('eliminarProducto');

Route::get('/admin/stock', [home_admin_controller::class, 'stock'])->name('adminStock');
Route::patch('/admin/stock/{stock}', [home_admin_controller::class, 'actualizarStock'])->name('actualizarStock');
Route::post('/admin/stock/nuevoStock', [home_admin_controller::class, 'nuevoStock'])->name('nuevoStock');

Route::get('/admin/categorias', [home_admin_controller::class, 'categorias'])->name('adminCategorias');
Route::post('/admin/categorias/nuevaCategoria', [home_admin_controller::class, 'nuevaCategoria'])->name('nuevaCategoria');
Route::patch('/admin/categorias/{categoria}', [home_admin_controller::class, 'actualizarCategorias'])->name('actualizarCategorias');
Route::delete('/admin/categorias/{categoria}', [home_admin_controller::class, 'eliminarCategoria'])->name('eliminarCategoria');

Route::get('/admin/pedidos', [home_admin_controller::class, 'pedidos'])->name('adminPedidos');
Route::patch('/admin/pedidos{pedidos}', [home_admin_controller::class, 'actualizarPedidos'])->name('actualizarPedidos');

/*              AUTH                 */

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::get('/logout', [LogoutController::class,'performAdmin'])->name('logoutAdmin');