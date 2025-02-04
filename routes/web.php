<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Groups
Route::get('/groups', [GroupController::class, 'index'])->name('groups');
Route::post('/group/save', [GroupController::class, 'save'])->name('group.save');
