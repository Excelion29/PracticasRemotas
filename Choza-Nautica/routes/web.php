<?php

use App\Http\Controllers\Admin\AdministradoresController;
use App\Http\Controllers\Admin\CarritosController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CombosController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\admin\EmpleadosController;
use App\Http\Controllers\Admin\MesaController;
use App\Http\Controllers\Admin\ProductosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CostoXDeliverysController;
use App\Http\Controllers\DetalleCommpra;
use App\Http\Controllers\MostraCombos;
use App\Http\Controllers\MostrarCategorias;
use App\Http\Controllers\MostrarMesas;
use App\Http\Controllers\MostrarProductos;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ObtenerOrder;
use App\Http\Controllers\PaymentVistaController;
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

Route::post('payments/pays',[PaymentVistaController::class,'pays'])->name('pay');
Route::get('payments/approval',[PaymentVistaController::class,'approval'])->name('approval');
Route::get('payments/cancelled',[PaymentVistaController::class,'cancelled'])->name('cancelled');

// SERVICIOS DE LA PÄGINA AL USUARIO
Route::get('category',[MostrarCategorias::class,'index'])->name('category.index');
Route::get('mesa',[MostrarMesas::class,'index'])->name('mesas.index');
Route::get('combos',[MostraCombos::class,'index'])->name('combos.index');
Route::get('products/{id}',[MostrarProductos::class,'show'])->name('products.show');
Route::get('products_json',[MostrarProductos::class,'products_json'])->name('productos.json');
Route::get('search_products',[MostrarProductos::class,'search_products'])->name('search_products');
Route::get('categorias_json',[MostrarCategorias::class,'categorias_json'])->name('categorias.json');
Route::get('search_categorias',[MostrarCategorias::class,'search_categorias'])->name('search_categorias');

// Carrito de compras
Route::resource('order',ObtenerOrder::class)->only(['update'])->names('order');
Route::get('order/{DetalleCommpra}/destroy',[ObtenerOrder::class,'destroy'])->name('orders.destroy');
Route::post('order/{product}/store',[ObtenerOrder::class,'store'])->name('order.store');
Route::get('order_direct/{product}/store',[ObtenerOrder::class,'store_a_product'])->name('store_a_product');
Route::post('order/{combo}/store_combo',[ObtenerOrder::class,'store_combo'])->name('order.store_combo');
Route::get('order_direct/{combo}/store_combo',[ObtenerOrder::class,'store_a_combo'])->name('store_a_combo');
Route::put('carrito_update',[CarritoController::class,'update'])->name('carrito.update');


//Cuenta
Route::get('micuenta',[MyAccountController::class,'my_account'])->name('mi_cuenta');
Route::get('mis_ordenes',[MyAccountController::class,'my_orders'])->name('my_orders');
Route::get('mis_reservaciones',[MyAccountController::class,'my_reserves'])->name('my_reserves');
Route::get('mis_deseos',[MyAccountController::class,'mis_deseos'])->name('mis_deseos');
Route::get('pagar',[MyAccountController::class,'pagar'])->name('shop.index');
Route::get('my_perfil',[MyAccountController::class,'my_perfil'])->name('my_perfil');            
Route::get('change_password',[MyAccountController::class,'change_password'])->name('change_password');
Route::get('MisDetallesOrdenes/{orden}', [MyAccountController::class,'show'])->name('Mis_detalles_orders.show');

Route::put('update_password/{user}/update',[UsersController::class,'update_password'])->name('update_password');
Route::put('update_perfil/{user}/update',[UsersController::class,'update_perfil'])->name('update_perfil');


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
Route::get('change_status/delivery/{delivery}', [DeliveryController::class,'change_status'])->name('change.status.delivery');
Route::get('change_status/carritos/{carrito}', [CarritosController::class,'change_status'])->name('change.status.carritos');
Route::resource('dashboard/combos', CombosController::class);
Route::resource('dashboard/productos', ProductosController::class);
Route::resource('dashboard/Delivery', DeliveryController::class);
Route::resource('dashboard/mesas', MesaController::class);

Route::get('dashboard/Ordenes', [CompraController::class,'index'])->name('admin_orders.index');
Route::get('DetallesOrdenes/{compra}', [CompraController::class,'show'])->name('detalles_orders.show');
Route::put('compra_update/{id}', [CompraController::class,'compra_update']);

// Route::resource('dashboard/carritos', CarritosController::class);
// Route::get('dashboard/carritos_p/{id}',[CarritosController::class,'show'])->name('carritos.pedidos.productos');
// Route::get('dashboard/carritos_c/{id}',[CarritosController::class,'show_combo'])->name('carritos.pedidos.combos');
Auth::routes();

// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');