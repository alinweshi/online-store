<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('admin/home', [HomeController::class, 'admin'])->middleware(["auth"])->name('admin.dashboard');
route::group(['middleware' => 'auth.admin'], function () {
    Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
});
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::group(['prefix' => 'admin', 'middleware' => ['auth.admin']], function () {
    route::get('/dashboard',  function () {
        return view('admins.dashboard.layout.index');
    });
    Route::get('/',  function () {
        $isAdmin = Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasRole('admin'); // 'role_name' should be replaced with the actual role name you want to check for.

        if ($isAdmin) {
            // The user has the specified role in the 'admin' guard
            return 'User has the role in the admin guard';
        } else {
            // The user doesn't have the specified role in the 'admin' guard
            return 'User does not have the role in the admin guard';
        }
    });
    Route::get('/permission',  function () {

            $admin = Auth::guard('admin')->user();
            dd(Auth::guard('admin')->user()->getPermissionsViaRoles());
            dd(Auth::guard('admin')->user()->getRoleNames());

            // The user has the specified role in the 'admin' guard

    });
    Route::get('/getroles+permissions', function () {
        $user = Auth::guard('admin')->user();

        if ($user) {
            $roles = $user->getRoleNames();
            $permissions = $user->getAllPermissions();
            // $roles now contains an array of role names for the authenticated admin

            // Print the roles
            foreach ($roles as $role) {
                echo $role . '<br>';
            }
            foreach ($permissions as $permission) {
                echo $permission . '<br>';
            }
        } else {
            echo 'User is not authenticated as an admin.';
        }
    });

    Route::resource('roles', 'App\Http\Controllers\Admin\RoleController');
    Route::resource('admins', 'App\Http\Controllers\Admin\AdminController');
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('permissions', 'App\Http\Controllers\Admin\PermissionController');
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('orders', 'App\Http\Controllers\Admin\OrderController');
    Route::resource('settings', 'App\Http\Controllers\Admin\SettingsController');
});

// Request::route()->getName();+
// route::group([], function () {
//     route::get('/product', [ProductController::class, 'index'])->name('product.index');
//     route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
//     route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
//     route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
//     route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
//     route::get('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
//     route::get('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');
// });
// route::group(['middleware' => ['auth', 'admin']], function () {
//     route::get('/setting', [SettingsController::class, 'index'])->name('setting.index');
//     route::get('/setting/create', [SettingsController::class, 'create'])->name('setting.create');
//     route::post('/setting/store', [SettingsController::class, 'store'])->name('setting.store');
//     route::get('/setting/{setting}', [SettingsController::class, 'show'])->name('setting.show');
//     route::get('/setting/{setting}/edit', [SettingsController::class, 'edit'])->name('setting.edit');
//     route::get('/setting/{setting}/update', [SettingsController::class, 'update'])->name('setting.update');
//     route::get('/setting/{setting}/delete', [SettingsController::class, 'delete'])->name('setting.delete');
// });
// route::group(['middleware' => ['auth']], function () {
//     route::get('/role', [RoleController::class, 'index'])->name('role.index');
//     route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
//     route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
//     route::get('/role/{role}', [RoleController::class, 'show'])->name('role.show');
//     route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
//     route::PUT('/role/{role}/update', [RoleController::class, 'update'])->name('role.update');
//     route::get('/role/{role}/delete', [RoleController::class, 'destroy'])->name('role.delete');
// });
// route::group(['middleware' => ['auth', 'admin']], function () {
//     route::get('/category', [CategoryController::class, 'index'])->name('category.index');
//     route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
//     route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
//     route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
//     route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
//     route::get('/category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
//     route::get('/category/{category}/delete', [CategoryController::class, 'delete'])->name('category.delete');
// });

// route::group(['middleware' => ['auth', 'admin']], function () {
//     route::get('/order', [OrderController::class, 'index'])->name('order.index');
//     route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
//     route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
//     route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
//     route::get('/order/{order}/edit', [OrderController::class, 'edit'])->name('order.edit');
//     route::get('/order/{order}/update', [OrderController::class, 'update'])->name('order.update');
//     route::get('/order/{order}/delete', [OrderController::class, 'delete'])->name('order.delete');
// });
// route::group(['middleware' => ['auth', 'admin']], function () {
//     route::get('/user', [UserController::class, 'index'])->name('user.index');
//     route::get('/user/create', [UserController::class, 'create'])->name('user.create');
//     route::post('/user/store', [UserController::class, 'store'])->name('user.store');
//     route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
//     route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
//     route::get('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
//     route::get('/user/{user}/delete', [UserController::class, 'delete'])->name('user.delete');
// });
// route::group(['middleware' => ['auth:admin']], function () {
//     route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
//     route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
//     route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
//     route::get('/admin/{admin}', [AdminController::class, 'show'])->name('admin.show');
//     route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
//     route::get('/admin/{admin}/update', [AdminController::class, 'update'])->name('admin.update');
//     route::get('/admin/{admin}/delete', [AdminController::class, 'destroy'])->name('admin.delete');
// });
