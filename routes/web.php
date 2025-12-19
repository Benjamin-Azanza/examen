<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;

Route::get('/', function () {
    return redirect()->route('prestamos.index');
});

Route::resource('prestamos', PrestamoController::class);
