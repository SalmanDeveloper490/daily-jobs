<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

// ALL LISTINGS
Route::get('/', [ListingController::class,'index']);

// SHOW CREATE FORM
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

// STORE FORM DATA
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

// SHOW EDIT FORM
Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

// UPDATE EDIT FORM
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

// DELETE
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

// MANAGE
Route::get('/listings/manage', [ListingController::class,'manage'])->middleware('auth');

// SINGLE LISTING
Route::get("/listings/{listing}",[ListingController::class,'show']);

// USER ROUTES
// SHOW REGISTER/CREATE FORM
Route::get("/register",[UserController::class,'create'])->middleware('guest');

//CREATE NEW USER
Route::post("/users",[UserController::class,'store']);

// LOGOUT USER
Route::post("/logout",[UserController::class,'logout'])->middleware('auth');

// SHOW LOGIN FORM
Route::get("/login",[UserController::class,'login'])->name('login')->middleware('guest');

//LOGIN USER
Route::post("/users/authenticate",[UserController::class,'authenticate']);
