<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {


    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.list');
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/inventory/save', [InventoryController::class, 'save'])->name('inventory.save');
    Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit'])
    ->where('id', '[0-9]+')
    ->name('inventory.edit');

    Route::post('inventory/update', [InventoryController::class, 'update'])
    ->name('inventory.update');
    Route::post('/inventory/delete', [InventoryController::class, 'delete'])
    ->name('inventory.delete');

});



