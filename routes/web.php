<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\RegLogController;
use App\Models\Items;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.welcome');
})->name('home');

Route::get('/catalog', function () {
    return view('pages.catalog', ['items' => Items::all()]);
})->name('catalog');

Route::controller(RegLogController::class)->group(function (){
    Route::middleware('guest')->group(function(){
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'register');
        Route::get('/login', 'edit')->name('login');
        Route::post('/login', 'login');
    });
    Route::middleware('auth')->group(function(){
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::middleware('admin')->group(function(){
    Route::controller(ItemsController::class)->group(function(){
        Route::get('/items/add', 'create')->name('items.create');
        Route::post('/items/store', 'store')->name('items.store');

        Route::get('/items/{id}/edit', 'edit')->name('items.edit');
        Route::patch('/items/{id}', 'update')->name('items.update');

        Route::delete('items/{id}', 'destroy')->name('items.destroy');
    });
});