<?php

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

Route::get('/', function () {
    return view('Advertise');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//route view
Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');


Route::get('Create','productController@create');
Route::post('save','productController@store');
Route::get('Display','productController@display')->middleware('checkLogin');
Route::get('Edit/{id}','productController@edit')->where(['id' => '[0-9]+'])->middleware('checkLogin');

Route::get('form', [productController::class, 'index']);
Route::post('store-form', [ProductController::class, 'store']);
//