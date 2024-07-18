<?php

use App\Http\Controllers\DeleteTemporalyImageController;
use App\Http\Controllers\StorePostController;
use App\Http\Controllers\UploadTemporalyImageController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'welcome')->name('welcome');
Route::post('/upload', UploadTemporalyImageController::class)->name('uploadTemporalyImage');
Route::delete('/delete', DeleteTemporalyImageController::class)->name('deleteTemporalyImage');
Route::post('/', StorePostController::class)->name('storePost');
