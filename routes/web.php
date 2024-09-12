<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {


    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->name('inventory.edit');
    Route::post('inventory/update', [InventoryController::class, 'update'])
    ->name('inventory.update');

   /* Route::get('libros/create', 'LibroController@create')->name('libros.create')->middleware('permission:libros.create');
    Route::post('libros/store', 'LibroController@store')->name('libros.store')->middleware('permission:libros.create');
    Route::get('libros/{libro}', 'LibroController@show')->name('libros.show')->middleware('permission:libros.show');
    Route::get('libros/{libro}/edit', 'LibroController@edit')->name('libros.edit')->middleware('permission:libros.edit');
    Route::put('libros/update', 'LibroController@update')->name('libros.update')->middleware('permission:libros.edit');
    Route::delete('libros/{libro}', 'LibroController@destroy')->name('libros.delete')->middleware('permission:libros.delete');*/

});


