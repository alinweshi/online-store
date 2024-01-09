<?php

use App\Http\Controllers\SendMails;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SendMailsController;
use App\Http\Controllers\User\TestController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\OrderCheckoutController;

//
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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'CheckUserStatus']);

route::get("/online-store", function () {
    return view('users.dashboard.layout.layout');
});
Route::group(['middleware' => ['auth'], 'prefix' => '/online-store'], function () {
    route::get('/products', [ProductController::class, "index"])->name('products');
    route::get('/products/{id}', [ProductController::class, "show"])->name('product.show');

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart/{id}', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::get('checkoutStore', [CartController::class, 'checkoutStore'])->name('checkout.store');
    Route::POST('PlaceOrderPost', [CartController::class, 'PlaceOrderPost'])->name('PlaceOrder.store');

    Route::get('orders', [OrderCheckoutController::class, 'ShowMyOrders'])->name('ShowMyOrders');
    Route::get('test', [TestController::class, 'test']);
    route::get('changestatus', [StatusController::class, 'changestatus']);
    route::get('sendemail', [SendMailsController::class, 'SendEmail']);
    // route::get('sendemail',function(){
    //     Mail::to('alinweshi@gmail.com')->send(new SendingMails());
    // });

});
// Route::get('/admin', [AdminController::class, 'index'])->middleware(["auth"])->name('admin'); // return view('dashboard.index')
// route::get("/showimage", [imagecontroller::class, "showimage"])->name("showimage");
// route::POST("/storeimage", [imagecontroller::class, "storeimage"])->name("storeimage");
// route::get("/photo", function () {
//     if (Storage::disk('photos')->put('ali.txt', 'hello from the other world')) {
//         return "ali";
//     };
// });
// route::get("/enterdata", [uploadingcontroller::class, "enterdata"])->name("enterdata");
// route::post("/storedata", [uploadingcontroller::class, "storedata"])->name("storedata");
