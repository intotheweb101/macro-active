<?php

use App\Http\Controllers\DemoDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DemoDashboardController::class, 'home'])->name('home');
Route::get('/creator-ops', [DemoDashboardController::class, 'creators'])->name('creators');
Route::get('/engineering-workflow', [DemoDashboardController::class, 'engineering'])->name('engineering');
