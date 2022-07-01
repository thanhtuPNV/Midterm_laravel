<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\T_restaurantController;
use Illuminate\Http\Request;

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

// Route::get('/show',[T_restaurantController::class, 'show']);
// Route::resource('restaurants', T_restaurantController::class);

Route::get("/Create", [T_restaurantController::class, "create"]);
Route::post("/Store", [T_restaurantController::class, "store"]);

// Route::get("/create", [T_foodController::class, "create"]);
// Route::post("/store", [T_foodController::class, "store"]);
Route::get("/show", [T_restaurantController::class, "show"]);
// Route::get('/showdetail/{id}', [T_foodController::class,'detail']);
