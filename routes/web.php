<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Docs\DocsController;
use App\Http\Controllers\Admin\Product\ProductController;

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
    return view('index');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])->name('form');
    Route::post('/form/add', [App\Http\Controllers\FormController::class, 'store'])->name('form-add');

    Route::get('/admin',[App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');
    Route::resource('/admin/docs', DocsController::class);
    Route::resource('/admin/products', ProductController::class);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
