<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImageGalleryController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


Route::get('/dashboard', [ImageGalleryController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [ImageGalleryController::class, 'upload']);
Route::delete('/dashboard/{id}', [ImageGalleryController::class, 'destroy']);

});
