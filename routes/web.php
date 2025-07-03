<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/suraj', function () {
//     return view('welcome'); 
// });
Route::get('/',[ListingController::class, 'index']);

// Route::get('/listings',[ListingController::class, 'index']);



//show create form
Route::get('/listings/create',[ListingController::class,'create']);

//store listing data
Route::post('/listings',[ListingController::class,'store'])->name('listingCreate');

//single listing 
Route::get('/listings/{listing}',[ListingController::class,'show']);

// show edit form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit']);

// show update form
Route::put('/listings/{listing}',[ListingController::class,'update']);

// delete form
Route::delete('/listings/{listing}',[ListingController::class,'destroy']);

Route::get('/register',[UserController::class ,'create']);