<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DropzoneController;

Route::get('dropzone', [DropzoneController::class, 'index']);
Route::post('dropzone/store', [DropzoneController::class, 'store'])->name('dropzone.store');
