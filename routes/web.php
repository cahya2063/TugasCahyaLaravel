<?php
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('homeuser');
Route::get('/', [HomeController::class, 'index2'])->name('landing');
Route::middleware('auth')->group(function () {
    Route::get('/admin', [HomeController::class, 'index1'])->name('produk.home');
    Route::post('/admin', [HomeController::class, 'store']) ->name("produk.store");
    Route::get('/admin/create', [HomeController::class, 'create'])->name('produk.create');
    Route::get('/admin/{produk}/edit', [HomeController::class, 'edit']) ->name("produk.edit");
    Route::post('/admin/{produk}', [HomeController::class, 'update']) ->name("produk.update");
    Route::delete('/admin/{produk}', [HomeController::class, 'destroy']) ->name("produk.destroy");
});

