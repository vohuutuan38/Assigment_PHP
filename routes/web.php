<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRoleAdminMiddleware;
use Illuminate\Support\Facades\Route;

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

// Route::get('/danhmucs', function () {
//     return view('admins.danhmucs.index');
// });

Route::get('/test', function () {
    return view('clients.dathang.index');
});

Route::get('login', [AuthController::class, 'showFormLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::get('register', [AuthController::class, 'showFormRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/admin', function () {
    return 'Đây là trang admin';
})->middleware(['auth', 'auth.admin']);


// Route::middleware('auth')->group(function(){

//     Route::get('/home', function () {
//             return view('home');
//         });
//     Route::get('/home1', function () {
//         return view('home');
//     });
// });

// Route::middleware('auth.admin')->group(function(){

//    Route::get('/admin',function(){
//      return 'Đây là trang admin';
//    });
// });

Route::get('product/detail/{id}', [ProductController::class, 'chiTietSanPham'])->name('products.detail');
Route::get('/list-cart', [CartController::class, 'listCart'])->name('cart.list');
Route::post('/add-to-cart', [CartController::class, 'addCart'])->name('cart.add');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// ROUTER DƠN HÀNG
Route::middleware('auth')->prefix('donhangs')
    ->as('donhangs.')
    ->group(function () {

        Route::get('/',             [OrderController::class, 'index'])->name('index');
        Route::get('/create',       [OrderController::class, 'create'])->name('create');
        Route::post('/store',       [OrderController::class, 'store'])->name('store');
        Route::get('/show/{id}',    [OrderController::class, 'show'])->name('show');
        Route::put('{id}/update',   [OrderController::class, 'update'])->name('update');
    });


// ROUTE ADMIN ================================
Route::middleware(['auth', 'auth.admin'])->prefix('admins')
    ->as('admins.') // as này để nối với name trong route hoặc as sẽ nối với as
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admins.dashbroad');
        })->name('dashbroad');

        // ROUTER DANH MỤC
        Route::prefix('danhmucs')
            ->as('danhmucs.')
            ->group(function () {

                Route::get('/', [DanhMucController::class, 'index'])->name('index');
                Route::get('/create', [DanhMucController::class, 'create'])->name('create');
                Route::post('/store', [DanhMucController::class, 'store'])->name('store');
                Route::get('/show/{id}', [DanhMucController::class, 'show'])->name('show');
                Route::get('{id}/edit', [DanhMucController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [DanhMucController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [DanhMucController::class, 'destroy'])->name('destroy');
            });


        // ROUTER SẢN PHẨM
        Route::prefix('sanphams')
            ->as('sanphams.')
            ->group(function () {

                Route::get('/', [SanPhamController::class, 'index'])->name('index');
                Route::get('/create', [SanPhamController::class, 'create'])->name('create');
                Route::post('/store', [SanPhamController::class, 'store'])->name('store');
                Route::get('/show/{id}', [SanPhamController::class, 'show'])->name('show');
                Route::get('{id}/edit', [SanPhamController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [SanPhamController::class, 'update'])->name('update');
                Route::delete('{id}/destroy', [SanPhamController::class, 'destroy'])->name('destroy');
            });
    });

// Route Quản lý tài khoản
Route::prefix('account')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('account.index');
    Route::post('/', [UserController::class, 'update'])->name('account.update');
    Route::delete('/', [UserController::class, 'destroy'])->name('account.destroy');
    Route::put('/', [UserController::class, 'changePassword'])->name('account.changePassword');
});
