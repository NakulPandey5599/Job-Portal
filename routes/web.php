<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use Illuminate\Auth\Events\Login;

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

//show create form
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

//store listing data
Route::post('/listings',[ListingController::class,'store'])->name('listingCreate')->middleware('auth');

//single listing 
Route::get('/listings/{listing}',[ListingController::class,'show']);

// show edit form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

// show update form
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

// delete form
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');



//show register/create from
Route::get('/register',[UserController::class ,'create'])->middleware('guest');

Route::post('/users',[UserController::class ,'store']);

//logout 
Route::post('/logout',[UserController::class ,'logout'])->middleware('auth');

// show login form 

Route::get('/login',[UserController::class ,'login'])->middleware('guest');

 //log in 

 
Route::post('/login/authenticate',[UserController::class ,'login']);
