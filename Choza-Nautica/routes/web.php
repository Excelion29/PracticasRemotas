<?php

use App\Http\Controllers\Admin\AdministradoresController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CombosController;
use App\Http\Controllers\admin\EmpleadosController;
use App\Http\Controllers\Admin\MesaController;
use App\Http\Controllers\Admin\ProductosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\DetalleCommpra;
use App\Http\Controllers\MostrarCategorias;
use App\Http\Controllers\MostrarMesas;
use App\Http\Controllers\MostrarProductos;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ObtenerOrder;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// SERVICIOS DE LA PÄGINA AL USUARIO
Route::get('category',[MostrarCategorias::class,'index'])->name('category.index');
Route::get('mesa',[MostrarMesas::class,'index'])->name('mesas.index');
Route::get('products/{id}',[MostrarProductos::class,'show'])->name('products.show');


// Carrito de compras
Route::resource('order',ObtenerOrder::class)->only(['update'])->names('order');
Route::get('order/{DetalleCommpra}/destroy',[ObtenerOrder::class,'destroy'])->name('orders.destroy');
Route::post('order/{product}/store',[ObtenerOrder::class,'store'])->name('order.store');
Route::get('order_direct/{product}/store',[ObtenerOrder::class,'store_a_product'])->name('store_a_product');
Route::put('carrito_update',[CarritoController::class,'update'])->name('carrito.update');


//Cuenta
Route::get('micuenta',[MyAccountController::class,'my_account'])->name('mi_cuenta');
Route::get('pagar',[MyAccountController::class,'pagar'])->name('shop.index');

// dashboard
Route::get('dashboard',[AdminController::class,'index'])->name('admin.index');
Route::resource('dashboard/cliente', UsersController::class);
Route::resource('dashboard/empleado', EmpleadosController::class);
Route::resource('dashboard/administrador', AdministradoresController::class);
Route::resource('dashboard/categorias', CategoriaController::class);
Route::get('change_status/categorias/{categoria}', [CategoriaController::class,'change_status'])->name('change.status.categorias');
Route::get('change_status/combos/{combo}', [CombosController::class,'change_status'])->name('change.status.combos');
Route::get('change_status/productos/{producto}', [ProductosController::class,'change_status'])->name('change.status.productos');
Route::get('change_status/mesas/{mesa}', [MesaController::class,'change_status'])->name('change.status.mesas');
Route::resource('dashboard/combos', CombosController::class);
Route::resource('dashboard/productos', ProductosController::class);
Route::resource('dashboard/mesas', MesaController::class);
Auth::routes();

// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');