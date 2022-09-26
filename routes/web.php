<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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




// Route::get('detail/{id}', 'HomeController@detail')->name('detail');
// Route::get('detail/{id}','HomeController@detail');
// Route::get('/detail/{id}', function ($id) {
//     return new HomeController($id);
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::resource('product', ProductController::class)->middleware('auth');
Route::resource('slider', SliderController::class)->only([
    'store', 'update', 'destroy'
]);


Auth::routes();
