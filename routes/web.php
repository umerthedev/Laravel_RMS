<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/useraction', [AdminController::class, 'useraction']);
Route::get('/delete_u/{id}', [AdminController::class, 'delete_u']);


// Food menu route
Route::get('/showfood', [AdminController::class, 'showfood']);
Route::post('/upload_foodmanu', [AdminController::class, 'upload_foodmanu']);
Route::get('/showAllfood', [AdminController::class, 'showAllfood']);





Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'admin']);



