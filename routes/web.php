<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;

Route::redirect('/', '/admin');

Route::get('/reviews', [DefaultController::class, 'index'])->name('reviews.index');

if (file_exists(__DIR__.'/backpack/custom.php')) {
    require __DIR__.'/backpack/custom.php';
}