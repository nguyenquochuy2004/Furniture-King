<?php

use App\Http\Controllers\Admin\DoahBoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Route as RoutingRoute;

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
Route::get('/', [HomeController::class,'index'])->name('index');
Route::post('search', [HomeController::class,'search'])->name('search');


Route::get('/category/{category}', [HomeController::class,'category'])->name('fe.category');
Route::get('/detail/{slug}', [HomeController::class,'detail'])->name('detail');
Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'postlogin']);
Route::get('/register', [UserController::class,'register'])->name('register');
Route::post('/register', [UserController::class,'postregister']);
Route::get('/logout', [UserController::class,'logout'])->name('logout');


Route::get('/logon', [AdminController::class,'logon'])->name('logon');
Route::post('/postlogon', [AdminController::class,'postlogon'])->name('admin.logon');
Route::get('/sign-out', [AdminController::class,'signOut'])->name('admin.signout');


Route::post('/add-cart',[CartController::class,'add'])->name('cart.add');
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::get('/delete/{id}', [CartController::class,'deleteCart'])->name('cart.delete');

// Route::get('/delete/{id}', [App\Http\Controllers\CartController::class, 'deleteCart'])->name('cart.delete');

// Route::delete('/cart/{id}', 'CartController@remove')->name('cart.remove');




Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', [DoahBoardController::class,'index'])->name('admin.index');
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    
});


// Route::middleware(['auth', 'checkRole:user'])->group(function () {
//     Route::get('/user/home', [UserController::class, 'userHome'])->name('user.home');
// });


// Route::middleware(['auth', 'checkRole:admin'])->group(function () {
//     Route::get('/admin/home', [UserController::class, 'adminHome'])->name('admin.home');
// });

