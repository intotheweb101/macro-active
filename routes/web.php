<?php

use App\Http\Controllers\DemoDashboardController;
use App\Http\Controllers\LaunchAssistantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DemoDashboardController::class, 'home'])->name('home');
Route::get('/creator-ops', [DemoDashboardController::class, 'creators'])->name('creators');
Route::get('/engineering-workflow', [DemoDashboardController::class, 'engineering'])->name('engineering');
Route::get('/launch-assistant', [LaunchAssistantController::class, 'show'])->name('launch-assistant');
Route::post('/launch-assistant', [LaunchAssistantController::class, 'generate'])->name('launch-assistant.generate');
