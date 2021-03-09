<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::resource('products', 'ProductController');

Route::prefix('products')->group(function () {
    Route::get('/downAmount/{id}', 'ProductController@downAmount');
    Route::get('/upAmount/{id}', 'ProductController@upAmount');
    Route::patch('/removeAmount', 'ProductController@removeAmount')->name('products.removeAmount');
    Route::patch('/addAmount', 'ProductController@addAmount')->name('products.AddAmount');
});

