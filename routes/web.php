<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChefsController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableRes;
use App\Models\Category;
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

// home controller start
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('users', [HomeController::class, "userindex"])->name('user.index');
Route::get('users/{id}', [HomeController::class, "userdelete"])->name('user.delete');
// home controller ends
// chefs controller start
Route::get('chefs', [ChefsController::class, 'index'])->name('chefs.create');
Route::post('chefs', [ChefsController::class, 'store'])->name('chefs.store');
Route::get('/cheftable', [ChefsController::class, "show"])->name('chefs.show');
Route::get('/chefdelete/{id}', [ChefsController::class, "destroy"])->name('chefs.del');
Route::get('/cheftable/{id}', [ChefsController::class, 'edit'])->name('chefs.edit');
Route::post('/cheftable/{id}', [ChefsController::class, 'update']);
// chefs controller ends
// dish controller start
Route::get('/dishes', [DishesController::class, 'index'])->name('dishes.index');
Route::post('/dishes', [DishesController::class, 'store'])->name('dishes.store');
Route::get('/dishestable', [DishesController::class, "show"])->name('dishes.show');
Route::get('/dishesdelete/{id}', [DishesController::class, "destroy"])->name('dishes.del');
Route::get('/dishestable/{id}', [DishesController::class, 'edit'])->name('dishes.edit');
Route::post('/dishestable/{id}', [DishesController::class, 'update']);
// dish controller ends
// category controller start
Route::get('/category', [CategoryController::class, "index"])->name('category.index');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categorytable', [CategoryController::class, "show"])->name('category.show');
Route::get('/categorydelete/{id}', [CategoryController::class, "destroy"])->name('category.del');
Route::get('/categorytable/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/categorytable/{id}', [CategoryController::class, 'update']);
// category controller ends
// table reservation controller start
Route::post('', [TableRes::class, 'store'])->name('tbres.store');
Route::get('/restable', [TableRes::class, "show"])->name('tbres.show');
Route::get('/restable/{id}', [TableRes::class, "destroy"])->name('tbres.del');
Route::get('/acceptres/{id}', [TableRes::class, 'accept'])->name('tableres.accept');
Route::get('/reserved', [TableRes::class, 'showres'])->name('tableres.showres');
// table reservation controller ends
// dish controller start
Route::get('/', [DishesController::class, 'showDishes']);
Route::post('/addcart/{id}', [DishesController::class, 'addcart'])->name('add.cart');
Route::get('/showcart', [DishesController::class, 'showCart']);
Route::get('/delcart/{id}', [DishesController::class, "delcart"]);




















Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
