<?php

use App\Http\Livewire\Users;
use App\Http\Livewire\Counter;
use App\Http\Livewire\SearchUsers;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/', function () {
    return view('try');
})->middleware('auth:sanctum');

//Route::get('/', \App\Http\Livewire\Counter::class);


Route::get('/counter', Counter::class)->middleware('auth:sanctum');
//This will put the content in layouts.app -> $slot
//so user has to be signed in
//in app.blade.php I commented out $header


Route::get('/searchusers', SearchUsers::class)->middleware('auth:sanctum');
//This will put the content in layouts.app -> $slot
//so user has to be signed in
//in app.blade.php I commented out $header


//Trying to get property 'profile_photo_url' of non-object laravel 8
//I had to be signed in!




Route::get('cities', [\App\Http\Controllers\CityController::class, 'index'])
    ->name('cities.index');

Route::get('states', [\App\Http\Controllers\StateController::class, 'index'])
    ->name('states.index');


Route::resource('houses', \App\Http\Controllers\HouseController::class)
    ->only(['create', 'store'])->middleware('auth:sanctum');
