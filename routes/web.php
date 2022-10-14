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

Route::get('/edit_food/{id}', [AdminController::class, 'edit_food']);
Route::post('/update_foodmanu/{id}', [AdminController::class, 'update_foodmanu']);
Route::get('/delete_food/{id}', [AdminController::class, 'delete_food']);

// show reservation route
Route::get('/showreservation', [AdminController::class, 'reservation']); 

//delete reservation route
Route::get('/delete_reservation/{id}', [AdminController::class, 'delete_reservation']);

//add chef route
Route::get('/add_chef', [AdminController::class, 'add_chef']);
//upload chef route
Route::post('/upload_chef', [AdminController::class, 'upload_chef']);
//show chef route
Route::get('/chef_list', [AdminController::class, 'chef_list']);
//edit chef route
Route::get('/edit_chef/{id}', [AdminController::class, 'edit_chef']);
//update chef route
Route::post('/update_chef/{id}', [AdminController::class, 'update_chef']);
//delete chef route
Route::get('/delete_chef/{id}', [AdminController::class, 'delete_chef']);







Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'admin']);



Route::post('/reservation', [HomeController::class, 'reservation']);

//add_to-cart
Route::post('/addcart/{id}', [HomeController::class, 'add_to_cart']);





