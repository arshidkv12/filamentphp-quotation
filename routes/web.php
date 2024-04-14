<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InvoiceController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function () {

    return view('welcome');
});

Route::get('/symlink', function () {
    Artisan::call('storage:link');
});

Route::get('/cart', [CartController::class, 'show']);
Route::get('/contact', [ContactController::class, 'show']);
Route::get('/invoice/{quotation}', [InvoiceController::class, 'show']);

Route::get('clear_cache', function () {

    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize');

    dd("Cache is cleared");

});